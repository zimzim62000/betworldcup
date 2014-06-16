<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DateTimeType extends AbstractType
{
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $year = intVal(date('Y'));
        for ($i = $year; $i > ($year - 5); $i--){
            $tabYears[$i] = $i;
        }

        $resolver->setDefaults(
            array(
                'attr' => array(
                    'label-inline' => 'label-inline',
                ),
                'widget' => 'choice',
                'empty_value' => array(
                    'year' => 'form.worldcup.type.date.emptyvalue.year',
                    'month' => 'form.worldcup.type.date.emptyvalue.month',
                    'day' => 'form.worldcup.type.date.emptyvalue.day'
                ),
                'years' => $tabYears,
                'format' => 'yyyy-MM-dd HH:ii',
            )
        );
    }


    public function getParent()
    {
        return 'datetime';
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'zimzim_bundles_worldcupbundle_datetimetype';
    }
}