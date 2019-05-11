<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request): Response
    {
        return $this->render('index.html.twig');
    }
}
