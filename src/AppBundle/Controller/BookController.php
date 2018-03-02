<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use AppBundle\Form\BookType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class BookController
 * @package AppBundle\Controller
 * @Route("/book")
 */
class BookController extends Controller
{
    /**
     * @Route("/list", name="list_book")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {
        $books = $this->getDoctrine()
            ->getRepository('AppBundle:Book')
            ->findAll();

        return $this->render('book/list.html.twig', array(
            'books' => $books
        ));
    }


    /**
     * @Route("/add", name="add_book")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $book = new Book();
        $form = $this->createForm(BookType::class, $book);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->persist($book);
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('notice', 'New product successfully created.');

            return $this->redirectToRoute('add_book');
        }

        return $this->render('book/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function editAction()
    {

    }

    public function deleteAction()
    {

    }
}
