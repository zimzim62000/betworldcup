<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserBetType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                $userbet = $event->getData();
                $form = $event->getForm();

                $form->add(
                    'scoreTeamA',
                    'zimzim_bundles_worldcupbundle_scoretype',
                    array(
                        'label' => 'Score equipe '.$userbet->getGame()->getTeamA()->getName()
                    )
                )
                    ->add(
                        'scoreTeamB',
                        'zimzim_bundles_worldcupbundle_scoretype',
                        array(
                            'label' => 'Score equipe '.$userbet->getGame()->getTeamB()->getName()
                        )
                    );
            }
        );
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'ZIMZIM\Bundles\WorldCupBundle\Entity\UserBet',
                'attr' => array(),
                'cascade_validation' => true
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zimzim_bundles_worldcupbundle_userbettype';
    }
}
