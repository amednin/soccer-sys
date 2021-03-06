<?php

namespace SoccerSys\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MatchType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('resultTeam2')
            ->add('resultTeam1')
            ->add('matchDate')
            ->add('teams', 'entity', array(
              'class' => 'SoccerSysFrontendBundle:Team',
              'property' => 'name',
              'multiple' => true))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SoccerSys\FrontendBundle\Entity\Match'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'match';
    }
}
