<?php
namespace R4F\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('text', 'textarea')
        ;
    }

    public function getName()
    {
        return 'r4f_sitebundle_messagetype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'R4F\SiteBundle\Entity\Message',
        );
    }
}
