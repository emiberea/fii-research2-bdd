<?php

namespace EB\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use EB\AppBundle\Entity\Admission;

class StudentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('fatherInitial')
            ->add('pin')
            ->add('city')
            ->add('address')
            ->add('highSchool')
            ->add('specialization')
            ->add('admissionExamGrade')
            ->add('baccalaureateAverageGrade')
            ->add('baccalaureateMaximumGrade')
            ->add('admission', 'entity', [
                'class' => 'EBAppBundle:Admission',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('a')
                        ->where('a.status = :status')
                        ->setParameter('status', Admission::STATUS_OPEN);
                },
                'placeholder' => false,
            ])
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EB\AppBundle\Entity\Student'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eb_appbundle_student';
    }
}
