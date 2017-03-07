<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Message;
use AppBundle\Entity\Utilisateur;
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/tchat")
 */
class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        $user = $this->getUser();
        $user->setConnected(true);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        $request->getSession()->set("usr", $user->getId());
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/users")
     */
    public function getUsers() {

        return new JsonResponse($this->getDoctrine()->getRepository(Utilisateur::class)->findBy(array("connected" => "1")));
//        return new JsonResponse($this->getDoctrine()->getRepository(Utilisateur::class)->findAll());
    }

    /**
     * @Route("/messages")
     */
    public function getMessages() {

        return new JsonResponse($this->getDoctrine()->getRepository(Message::class)->findAll());
    }

    /**
     * @Route("/message/add")
     * @param Request $r
     */
    public function addMessage(Request $r) {
        $user = $this->getUser();
        $message = new Message();
        $message->setMessage($r->get("msg"));
        $message->setUtilisateur($user);
        $d = new DateTime();
        $d->setTimestamp(time());
        $d->format('Y-m-d H:i:s');
        $message->setHeure($d);
        $em = $this->getDoctrine()->getManager();
        $em->persist($message);
        $em->flush();
        return new Response("ok");
    }

    /**
     * @Route("/user/typing")
     */
    public function setTyping(Request $r){
        $user = $this->getUser();
        $user->setTyping(true);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        return new Response("ok");
    }
    /**
     * @Route("/user/typing/no")
     */
    public function setNotTyping(Request $r){
        $user = $this->getUser();
        $user->setTyping(false);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        return new Response("nok");
    }

}
