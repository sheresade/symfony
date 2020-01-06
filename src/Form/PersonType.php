<?php

namespace App\Form;

use App\Entity\Person;
use App\Entity\Account;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class PersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname')
            ->add('firstname')
            ->add('zipCode')
            ->add('city')
            ->add('roadNumber')
            ->add('roadName')
            ->add('birthday',BirthdayType::class)

          /*  ->add('birthday',DateType::class,[
                'years'=>[
                    1999,
                    1998,
                    1997,
                    1996,
                    1995
                ]
            ])*/
            ->add('sex')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Person::class,
        ]);
    }
}
