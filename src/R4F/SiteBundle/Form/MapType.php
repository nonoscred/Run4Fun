<?php
namespace R4F\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use R4F\SiteBundle\Entity\Address;

class MapType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('priority', 'text')	
            ->add('address', new AddressType)
        ;
    }

    public function getName()
    {
        return 'r4f_sitebundle_maptype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'R4F\SiteBundle\Entity\Address',
        );
    }
}
