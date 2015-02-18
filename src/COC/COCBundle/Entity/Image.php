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
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\ImageBestAttack", mappedBy="Image", cascade={"persist"})
     **/
    private $imagebestattacks;

    /**
     * @ORM\OneToMany(targetEntity="COC\COCBundle\Entity\ImageBonus", mappedBy="Image", cascade={"persist"})
     **/
    private $imagebonuses;

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

    public function getUploadRootDir()
    {
        return __dir__ . '/../../../../web/uploads';
    }

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getAssetPath()
    {
        return 'uploads/' . $this->path;
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
}
