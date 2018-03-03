<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $books = $this->getDoctrine()
            ->getRepository('AppBundle:Book')
            ->getLastFiveBooks();

        return $this->render('default/index.html.twig', [
            'lastBooks' => $books,
        ]);
    }
}
