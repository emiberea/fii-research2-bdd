<?php

namespace EB\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // custom fields
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('terms', 'checkbox', array(
                'mapped' => false,
                'label' => 'Terms and Conditions',
                'constraints' => array(
                    new Assert\IsTrue(array('message' => 'In order to use our services, you must agree to our Terms and Conditions.'))
                ),
            ));
        ;
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'eb_user_registration';
    }
}
