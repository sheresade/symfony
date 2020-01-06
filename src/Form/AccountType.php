<?php

namespace App\Form;

use App\Entity\Person;
use App\Entity\Account;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('iban')
            ->add('balance')
            ->add('mountDebit')

            ->add('type',ChoiceType::class,[
                'label' => 'Type :',
                'required' => true,
                'choices' => array(
                    'Livret A' => 'Livret A',
                    'Livret Jeune' => 'Livret Jeune',
                    'Compte Courrant' => 'Compte Courrant',
                    'Compte Join' => 'Compte Join',
                ),
                'placeholder' => 'choiser type',
            ]
        )
            ->add('owner',EntityType::class,[
                'class'=>Person::class,
                'choice_label'=>function($request){
                    return $request->getFirstname().' '.$request->getLastname();
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Account::class,
        ]);
    }
}
