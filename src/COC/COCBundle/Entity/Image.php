<?php
namespace COC\COCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\validator\Constraints as Assert;
/**
 * Media
 *
 * @ORM\Table("image")
 * @ORM\Entity(repositoryClass="COC\COCBundle\Repository\ImageRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Image
{
    private $temp;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var \DateTime
     *
     * @ORM\COlumn(name="updated_at",type="datetime", nullable=false)
     */
    private $updateAt;

    /**
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\ImageBestAttack", mappedBy="image", cascade={"persist"})
     **/
    private $imagebestattacks;

    /**
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\ImageBase", mappedBy="image", cascade={"persist"})
     **/
    private $imagebases;

    /**
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\ImageBonus", mappedBy="image", cascade={"persist"})
     **/
    private $imagebonuses;

    /**
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\Clan", mappedBy="image", cascade={"persist"})
     **/
    private $clans;

    /**
     * @ORM\PostLoad()
     */
    public function postLoad()
    {
        $this->updateAt = new \DateTime();
    }

    public function __toString()
    {
        return (string)$this->id;
    }

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    private $path;


    public $file;

    private $idclan;

    public function getUploadRootDir()
    {
        return __dir__ . '/../../../../web/uploads/'. $this->getIdclan();
    }

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getWebPath($id_clan = null)
    {
        if ( $id_clan == null)
        {
            $id_clan = $this->idclan;
        }
        return 'uploads/' . $id_clan . '/' . $this->path;
    }

    public function getAssetPath()
    {
        return 'uploads/' . $this->getIdclan() . '/' . $this->path;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getIdclan()
    {
        return $this->idclan;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // check if we have an old image path
        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        $this->updateAt = new \DateTime();

        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        $file = $this->getAbsolutePath();
        if (file_exists($file) &&  is_writable($file))
        {
            unlink ( $file );
        }


    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return Media
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Media
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    public function setIdclan($clan)
    {
        $this->idclan = $clan;

        return $this;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->imagebestattacks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add imagebestattacks
     *
     * @param \COC\COCBundle\Entity\ImageBestAttack $imagebestattacks
     * @return Image
     */
    public function addImagebestattack(\COC\COCBundle\Entity\ImageBestAttack $imagebestattacks)
    {
        $this->imagebestattacks[] = $imagebestattacks;

        return $this;
    }

    /**
     * Remove imagebestattacks
     *
     * @param \COC\COCBundle\Entity\ImageBestAttack $imagebestattacks
     */
    public function removeImagebestattack(\COC\COCBundle\Entity\ImageBestAttack $imagebestattacks)
    {
        $this->imagebestattacks->removeElement($imagebestattacks);
    }

    /**
     * Get imagebestattacks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImagebestattacks()
    {
        return $this->imagebestattacks;
    }

    /**
     * Add imagebases
     *
     * @param \COC\COCBundle\Entity\ImageBase $imagebases
     * @return Image
     */
    public function addImagebase(\COC\COCBundle\Entity\ImageBase $imagebases)
    {
        $this->imagebases[] = $imagebases;

        return $this;
    }

    /**
     * Remove imagebases
     *
     * @param \COC\COCBundle\Entity\ImageBase $imagebases
     */
    public function removeImagebase(\COC\COCBundle\Entity\ImageBase $imagebases)
    {
        $this->imagebases->removeElement($imagebases);
    }

    /**
     * Get imagebases
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImagebases()
    {
        return $this->imagebases;
    }

    /**
     * Add imagebonuses
     *
     * @param \COC\COCBundle\Entity\ImageBonus $imagebonuses
     * @return Image
     */
    public function addImagebonus(\COC\COCBundle\Entity\ImageBonus $imagebonuses)
    {
        $this->imagebonuses[] = $imagebonuses;

        return $this;
    }

    /**
     * Remove imagebonuses
     *
     * @param \COC\COCBundle\Entity\ImageBonus $imagebonuses
     */
    public function removeImagebonus(\COC\COCBundle\Entity\ImageBonus $imagebonuses)
    {
        $this->imagebonuses->removeElement($imagebonuses);
    }

    /**
     * Get imagebonuses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImagebonuses()
    {
        return $this->imagebonuses;
    }



    /**
     * Add clans
     *
     * @param \COC\COCBundle\Entity\Clan $clans
     * @return Image
     */
    public function addClan(\COC\COCBundle\Entity\Clan $clans)
    {
        $this->clans[] = $clans;

        return $this;
    }

    /**
     * Remove clans
     *
     * @param \COC\COCBundle\Entity\Clan $clans
     */
    public function removeClan(\COC\COCBundle\Entity\Clan $clans)
    {
        $this->clans->removeElement($clans);
    }

    /**
     * Get clans
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClans()
    {
        return $this->clans;
    }
}
