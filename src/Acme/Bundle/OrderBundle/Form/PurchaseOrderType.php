<?php

namespace Acme\Bundle\OrderBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PurchaseOrderType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('status')
            ->add('shippingAddress')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\Bundle\OrderBundle\Entity\PurchaseOrder'
        ));
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_bundle_orderbundle_purchaseorder';
    }
    
}
