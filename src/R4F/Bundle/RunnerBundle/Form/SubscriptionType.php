<?php

namespace R4F\Bundle\RunnerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SubscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user')
            ->add('course')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'R4F\Bundle\RunnerBundle\Entity\Subscription'
        ));
    }

    public function getName()
    {
        return 'r4f_bundle_runnerbundle_subscriptiontype';
    }
}
