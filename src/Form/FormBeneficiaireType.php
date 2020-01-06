<?php

namespace App\Form;

use App\Entity\Person;
use App\Entity\Account;
use App\Repository\AccountRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormBeneficiaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $person = $options['person'];
        $builder
        
            ->add('beneficiaire',EntityType::class,[
                'class'=>Account::class,
                'label' => 'Beneficiaire :',
                'required' => true,
                'query_builder' => function (AccountRepository $er) use ($person) {
                    $res = $er->createQueryBuilder('a')
                    ->leftJoin('a.people', 'p')
                    ->where('p.id != :people')
                    ->orWhere('p.id IS NULL')
                    ->setParameter('people', $person);
                    return $res;
                },
                'choice_label'=>function($request){
                    return $request->getOwner()->getFirstname()." ".$request->getOwner()->getLastname()." ".$request->getType();
                },
                'placeholder' => 'choiser Beneficiaire',
                'multiple' =>true,


            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // ...,
            'person' => 0,
        ]);
    }
}
