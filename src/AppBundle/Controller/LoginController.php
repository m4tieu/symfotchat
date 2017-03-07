<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Utilisateur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of LoginController
 *
 * @author loic
 */
class LoginController extends Controller {

    /**
     * @Route("/")
     * @param Request $r
     */
    public function red(Request $r){
        return $this->redirectToRoute("homepage");
    }
    
    
    /**
     * @Route("/login")
     */
    public function loginAction(){
         return $this->render('default/login.html.twig');
    }
    
    /**
     * @Route("/login_check",name="log")
     * @param \AppBundle\Controller\Request $r
     */
    public function loginCheck(Request $r){
        
    }
    
    
    /**
     * @Route("/logout")
     */
    public function logout(Request $r) {
        return new Response("", 401);
    }
/**
     * @Route("/disconnect/{id}")
     */
    public function disconnect(Request $r,$id){
        $em = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository(Utilisateur::class)->find($id);
        $user->setConnected(false);
        $em->persist($user);
        $em->flush();
        return $this->redirectToRoute("homepage");
    }
}
