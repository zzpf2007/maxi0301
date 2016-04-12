<?php

namespace Acme\Bundle\ProductBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\Bundle\ProductBundle\Entity\Serie;
use Acme\Bundle\ProductBundle\Form\SerieType;

/**
 * Serie controller.
 *
 */
class SerieController extends Controller
{
    /**
     * Lists all Serie entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $series = $em->getRepository('AcmeProductBundle:Serie')->findAll();

        return $this->render('serie/index.html.twig', array(
            'series' => $series,
        ));
    }

    /**
     * Creates a new Serie entity.
     *
     */
    public function newAction(Request $request)
    {
        $serie = new Serie();
        $form = $this->createForm('acme_serie_type', $serie);
        $form->handleRequest();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($serie);
            $em->flush();

            return $this->redirectToRoute('serie_show', array('id' => $serie->getId()));
        }

        return $this->render('serie/new.html.twig', array(
            'serie' => $serie,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Serie entity.
     *
     */
    public function showAction(Serie $serie)
    {
        $deleteForm = $this->createDeleteForm($serie);

        return $this->render('serie/show.html.twig', array(
            'serie' => $serie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Serie entity.
     *
     */
    public function editAction(Request $request, Serie $serie)
    {
        $deleteForm = $this->createDeleteForm($serie);
        $editForm = $this->createForm('acme_serie_type', $serie);
        $editForm->handleRequest();

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($serie);
            $em->flush();

            return $this->redirectToRoute('serie_edit', array('id' => $serie->getId()));
        }

        return $this->render('serie/edit.html.twig', array(
            'serie' => $serie,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Serie entity.
     *
     */
    public function deleteAction(Request $request, Serie $serie)
    {
        $form = $this->createDeleteForm($serie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($serie);
            $em->flush();
        }

        return $this->redirectToRoute('serie_index');
    }

    /**
     * Creates a form to delete a Serie entity.
     *
     * @param Serie $serie The Serie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Serie $serie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('serie_delete', array('id' => $serie->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
