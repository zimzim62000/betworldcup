<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Form\Type;

use Symfony\Component\Form\AbstractType;

class CheckboxAlignType extends AbstractType
{
    public function getParent()
    {
        return 'entity';
    }

    public function getName()
    {
        return 'zimzim_bundles_worldcupbundle_checkboxaligntype';
    }
}