<?php

namespace COC\COCBundle\Controller;

use COC\COCBundle\Entity\UserInfo;
use COC\COCBundle\Form\Type\SeasonType;
use Symfony\Component\HttpFoundation\Request;
use COC\COCBundle\Form\Type\UserInfoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserInfoController extends Controller
{
    public function indexAction(Request $request)
    {
        $form = $this->get('form.factory')->create(new SeasonType(), null);
        if ($request->isMethod('POST'))
        {
            $data = $request->request->all();
           // print_r($data);
            $season = $data['season'];

           // //print_r($data['season']);
            // string
            $season = $season['season'];

            $em = $this->getDoctrine()->getManager();
            $test = $em->getRepository('COCBundle:Season')->getSeason($season);


            $list = $em->getRepository('COCBundle:UserInfo')->findUserInfoBySeason($season);
            // $season = $em->getRepository('COCBundle:Season')->getActualSeason();
            // var_dump($season);
            return $this->render('COCBundle:UserInfo:index.html.twig', array('userInfos' => $list, 'form' => $form->createView() , 'season'=> $test));
        }
        $em = $this->getDoctrine()->getManager();
        $currentSeason = $em->getRepository('COCBundle:Season')->getActualSeason();

      //  var_dump($currentSeason);
        $list = $em->getRepository('COCBundle:UserInfo')->findUserInfoBySeason($currentSeason);

        // $season = $em->getRepository('COCBundle:Season')->getActualSeason();
        // var_dump($season);

        return $this->render('COCBundle:UserInfo:index.html.twig', array('userInfos' => $list, 'form' => $form->createView(), 'season'=> $currentSeason));
    }

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:UserInfo')->findOneByUser($id);

        if (!$list)
        {
            throw $this->createNotFoundException(
                'No player found for id ' . $id
            );
        }

        return $this->render('COCBundle:UserInfo:show.html.twig', array('info' => $list));
    }

    public function editAction ($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        //$userInfo = $em->getRepository('COCBundle:UserInfo')->findOneByUser($id);
        $userInfo = $em->getRepository('COCBundle:UserInfo')->find($id);

        $form = $this->get('form.factory')->create(new UserInfoType(), $userInfo);

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($userInfo);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_user_info'));
        }

        return $this->render('COCBundle:UserInfo:edit.html.twig', array(
                'form'      =>  $form->createView(),
                'userInfo'  => $userInfo
        ));
    }


    public function addAction (Request $request)
    {
        $userInfo = new UserInfo();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new UserInfoType(), $userInfo);

        if ($form->handleRequest($request)->isValid())
        {
            $currentSeason = $em->getRepository('COCBundle:Season')->getActualSeason();
            $userInfo->setSeason($currentSeason);
            $em->persist($userInfo);
            $em->flush();
            return $this->redirect($this->generateUrl('coc_user_info'));
        }

        return $this->render('COCBundle:UserInfo:add.html.twig', array(
            'form'      =>  $form->createView(),
        ));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $listInfo = $em->getRepository('COCBundle:UserInfo')->find($id);

        if(!$listInfo)
        {
            throw $this->createNotFoundException('No player found');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($listInfo);
        $em->flush();

        return $this->redirect($this->generateUrl('coc_user_info'));

    }
}
