<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ScoreType extends AbstractType
{
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $data = array();
        for($i = 0; $i < 15; $i++){

            $data[$i] = $i;
        }

        $resolver->setDefaults(
            array(
                'widget' => 'choice',
                'choices' => $data,
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
        return 'zimzim_bundles_worldcupbundle_scoretype';
    }
}