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

            $this->addFlash('notice', 'Le libre a bien été ajouté.');

            return $this->redirectToRoute('list_book');
        }

        return $this->render('book/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit_book")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $id)
    {
        $book = $this->getDoctrine()
            ->getRepository('AppBundle:Book')
            ->find($id);

        if (empty($book)) {
            $this->addFlash('error', 'Livre introuvable.');
            return $this->redirectToRoute('list_book');
        }

        $form = $this->createForm(BookType::class, $book);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();

            $this->addFlash('notice', 'Le livre a été mise à jour.');

            return $this->redirectToRoute('list_book');
        }

        return $this->render('book/edit.html.twig', array(
            'form' => $form->createView(),
            'book' => $book
        ));
    }

    /**
     * @Route("/delete/{id}", name="delete_book")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction($id)
    {
        $book = $this->getDoctrine()
            ->getRepository('AppBundle:Book')
            ->find($id);

        if (empty($book)) {
            $this->addFlash('error', 'Livre introuvable.');

            return $this->redirectToRoute('list_book');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($book);
        $em->flush();

        $this->addFlash('notice', 'Livre supprimé.');

        return $this->redirectToRoute('list_book');
    }

    /**
     * @Route("/detail/{id}", name="detail_book")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function detailAction($id)
    {
        $book = $this->getDoctrine()
            ->getRepository('AppBundle:Book')
            ->find($id);

        if (empty($book)) {
            $this->addFlash('error', 'Livre introuvable.');

            return $this->redirectToRoute('list_book');
        }

        return $this->render('book/detail.html.twig', array(
            'book' => $book
        ));
    }
}
