<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AboutUsController extends Controller
{
    /**
     * @Route("/about", name="about")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('about.html.twig');
    }
}
