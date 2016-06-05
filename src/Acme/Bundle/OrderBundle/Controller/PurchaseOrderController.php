<?php

namespace Acme\Bundle\OrderBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\Bundle\OrderBundle\Entity\PurchaseOrder;
use Acme\Bundle\OrderBundle\Form\PurchaseOrderType;

/**
 * PurchaseOrder controller.
 *
 */
class PurchaseOrderController extends Controller
{
    /**
     * Lists all PurchaseOrder entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $purchaseOrders = $em->getRepository('AcmeOrderBundle:PurchaseOrder')->findAll();

        return $this->render('purchaseorder/index.html.twig', array(
            'purchaseOrders' => $purchaseOrders,
        ));
    }

    /**
     * Creates a new PurchaseOrder entity.
     *
     */
    public function newAction(Request $request)
    {
        $purchaseOrder = new PurchaseOrder();
        $form = $this->createForm(new PurchaseOrderType(), $purchaseOrder);
        $form->handleRequest();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($purchaseOrder);
            $em->flush();

            return $this->redirectToRoute('purchaseorder_show', array('id' => $purchaseOrder->getId()));
        }

        return $this->render('purchaseorder/new.html.twig', array(
            'purchaseOrder' => $purchaseOrder,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PurchaseOrder entity.
     *
     */
    public function showAction(PurchaseOrder $purchaseOrder)
    {
        $deleteForm = $this->createDeleteForm($purchaseOrder);

        return $this->render('purchaseorder/show.html.twig', array(
            'purchaseOrder' => $purchaseOrder,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing PurchaseOrder entity.
     *
     */
    public function editAction(Request $request, PurchaseOrder $purchaseOrder)
    {
        $deleteForm = $this->createDeleteForm($purchaseOrder);
        $editForm = $this->createForm(new PurchaseOrderType(), $purchaseOrder);
        $editForm->handleRequest();

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($purchaseOrder);
            $em->flush();

            return $this->redirectToRoute('purchaseorder_edit', array('id' => $purchaseOrder->getId()));
        }

        return $this->render('purchaseorder/edit.html.twig', array(
            'purchaseOrder' => $purchaseOrder,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PurchaseOrder entity.
     *
     */
    public function deleteAction(Request $request, PurchaseOrder $purchaseOrder)
    {
        $form = $this->createDeleteForm($purchaseOrder);
        $form->handleRequest();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($purchaseOrder);
            $em->flush();
        }

        return $this->redirectToRoute('purchaseorder_index');
    }

    /**
     * Creates a form to delete a PurchaseOrder entity.
     *
     * @param PurchaseOrder $purchaseOrder The PurchaseOrder entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PurchaseOrder $purchaseOrder)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('purchaseorder_delete', array('id' => $purchaseOrder->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
