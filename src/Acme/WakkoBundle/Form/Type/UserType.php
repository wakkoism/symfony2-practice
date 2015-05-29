<?php

namespace Acme\WakkoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('email', 'email')
            ->add('password', 'password')
            ->add('roles')
            ->add('status', 'choice', array(
                'choices' => array(
                    1 => 'active',
                    0 => 'disabled',
                )
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\WakkoBundle\Entity\User',
        ));

    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_wakkobundle_user';
    }
}
