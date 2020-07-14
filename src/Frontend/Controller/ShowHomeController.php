<?php


namespace App\Frontend\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShowHomeController extends AbstractController
{

    /**
     * @Route("/")
     */
    public function invoke()
    {
        return $this->render('frontend/base.html.twig');
    }
}