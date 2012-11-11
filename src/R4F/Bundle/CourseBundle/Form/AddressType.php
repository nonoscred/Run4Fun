<?php
namespace R4F\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('address', 'text')
            ->add('city', 'text')
            ->add('zip_code', 'text')
            ->add('country', 'choice', array(
            'choices' => array('france' => 'France')
        ));
    }

    public function getName()
    {
        return 'r4f_sitebundle_addresstype';
    }
}
