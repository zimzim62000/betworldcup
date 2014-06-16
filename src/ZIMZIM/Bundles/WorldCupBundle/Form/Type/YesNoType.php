<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class YesNoType extends AbstractType
{
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'widget' => 'choice',
                'choices' => array(
                    '0' => 'form.worldcup.type.yesno.no',
                    '1' => 'form.worldcup.type.yesno.yes'
                ),
                'attr' => array(
                    'label-inline' => 'label-inline',
                ),
                'empty_value' => '',
                'required' => false
            )
        );
    }


    public function getParent()
    {
        return 'choice';
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'zimzim_bundles_worldcupbundle_yesnotype';
    }
}