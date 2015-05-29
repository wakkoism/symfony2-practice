<?php

namespace Acme\WakkoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ScheduleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('scheduleTime', null, array(
                'data' => empty($options['data']->getScheduleTime()) ? new \DateTime()  : $options['data']->getScheduleTime()
            ))
            ->add('customer')
            ->add('user')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\WakkoBundle\Entity\Schedule',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_wakkobundle_schedule';
    }
}
