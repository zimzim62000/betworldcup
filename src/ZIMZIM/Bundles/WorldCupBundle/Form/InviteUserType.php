<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InviteUserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'email')
            ->add('submit', 'submit', array('label' => 'button.submitemail'))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'data_class' => 'ZIMZIM\Bundles\WorldCupBundle\Entity\UserClientGame',
                'attr' => array(
                )
            ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zimzim_bundles_worldcupbundle_inviteusertype';
    }
}
