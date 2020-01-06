<?php

namespace App\Form;

use App\Entity\Account;
use App\Entity\CarteBancaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarteBancaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero')
            ->add('dateExpriration')
            ->add('titule')
            ->add('account',EntityType::class,[
                'class'=>Account::class,
                'choice_label'=>function($request){
                    return $request->getOwner()->getFirstname()." ".$request->getOwner()->getLastname()." ".$request->getType();
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CarteBancaire::class,
        ]);
    }
}
