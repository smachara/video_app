<?php

namespace AppBundle\Controller;

use ModelBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use \Symfony\Component\Serializer\Normalizer;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(User::class)->findAll();

        return $this->get_json($users);


    }

     public function get_json($data){
        $normalizer = array (new Normalizer\GetSetMethodNormalizer());
        $encoder = ["json"=>new JsonEncoder()];
        $serializer = new Serializer($normalizer,$encoder);
        $json = $serializer->serialize($data,'json');

        $response = new \Symfony\Component\HttpFoundation\Response();
        $response->setContent($json);
        $response->headers->set("Content-Type", "application/json");
        return $response;
    }

}
