<?php

namespace EB\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdmissionEditType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sessionDate')
            ->add('budgetFinancedNo')
            ->add('feePayerNo')
            ->add('close', 'checkbox', [
                'mapped' => false,
            ])
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EB\AppBundle\Entity\Admission'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eb_appbundle_admission';
    }
}
