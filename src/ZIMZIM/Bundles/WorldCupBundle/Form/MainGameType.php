<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use ZIMZIM\Bundles\WorldCupBundle\Entity\GameRepository;

class MainGameType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('text')
            ->add('dateStart', 'zimzim_bundles_worldcupbundle_datetype')
            ->add('dateEnd', 'zimzim_bundles_worldcupbundle_datetype')
            ->add('games', 'zimzim_bundles_worldcupbundle_checkboxaligntype', array(
                    'expanded' => true,
                    'multiple' => true,
                    'attr' => array('label-inline' => true),
                    'label' => 'form.user.usersplayerstype.label',
                    'class' => 'ZIMZIMBundlesWorldCupBundle:Game',
                    'query_builder' => function(GameRepository $er) {
                            return $er->createQueryBuilder('g')
                                ->orderBy('g.date', 'ASC');
                        },
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ZIMZIM\Bundles\WorldCupBundle\Entity\MainGame',
            'attr' => array(

            ),
            'cascade_validation' => true
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zimzim_bundles_worldcupbundle_maingametype';
    }
}
