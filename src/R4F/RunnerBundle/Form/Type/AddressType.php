<?php
namespace R4F\RunnerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('zip_code', 'text');
    }

    public function getName()
    {
        return 'R4F_runnerbundle_addresstype';
    }
}
