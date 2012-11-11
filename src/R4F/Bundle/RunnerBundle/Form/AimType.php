<?php

namespace R4F\Bundle\RunnerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AimType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'R4F\Bundle\RunnerBundle\Entity\Aim'
        ));
    }

    public function getName()
    {
        return 'r4f_bundle_runnerbundle_aimtype';
    }
}
