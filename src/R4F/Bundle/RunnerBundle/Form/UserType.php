<?php

namespace R4F\Bundle\RunnerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('email')
            ->add('password')
            ->add('phone_number')
            ->add('birthdate', 'birthday')
            ->add('sex', 'choice', array(
                'choices' => array(
                    'm'  => 'Homme',
                    'f'  => 'Femme'
                ),
                'multiple' => false,
                'expanded' => true,
            ))
            ->add('level')
            ->add('aim')
            //->add('address', new AddressType())
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'R4F\Bundle\RunnerBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'r4f_bundle_runnerbundle_usertype';
    }
}
