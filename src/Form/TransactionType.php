<?php

namespace App\Form;

use App\Entity\Person;
use App\Entity\Account;
use App\Entity\Category;
use App\Entity\Transaction;
use App\Entity\CarteBancaire;
use App\Repository\AccountRepository;
use Symfony\Component\Form\AbstractType;
use App\Repository\CarteBancaireRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $account = $options['account'];
        $builder
            ->add('amount')
            ->add('date')
            ->add('label')
            ->add('carteBlue',EntityType::class,[
                'required' => false,

                'class'=>CarteBancaire::class,
                'query_builder' => function (CarteBancaireRepository $er) use ($account) {
                    $res = $er->createQueryBuilder('a')
                    ->where('a.account = :person')
                    ->setParameter('person', $account->getOwner());
                    return $res;
                },
                'choice_label'=>function($request){
                    return $request->getNumero();
                },
                'placeholder' => 'choiser une carte blue',

            ])
            ->add('category',EntityType::class,[
                'class'=>Category::class,
                'label' => 'Category :',
                'required' => true,
                'choice_label'=>function($request){
                    return $request->getName();
                },
                'placeholder' => 'Choiser une category',
            ])
            ->add('creditAccount',EntityType::class,[
                'class'=>Account::class,
                'query_builder' => function (AccountRepository $er) use ($account) {
                    $res = $er->createQueryBuilder('a')
                    ->join('a.people', 'p')
                    ->where('p.id = :person')
                    ->setParameter('person', $account->getOwner());
                    return $res;
                },
                'choice_label'=>function($request){
                    return $request->getOwner()->getFirstname()." ".$request->getOwner()->getLastname()." ".$request->getType();
                },
                'placeholder' => 'choiser Beneficiaire',
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transaction::class,
            'account'=>0
        ]);
    }

    /*
        $builder
            ->add('amount')
            ->add('date')
            ->add('label')
            ->add('creditAccount',EntityType::class,[
                'class'=>Account::class,
                'choice_label'=>function($account){
                    return $account->getOwner()->getFirstname().' '.$account->getOwner()->getLastname().' '.$account->getType();
                },
            ])
            ->add('debitAccount',EntityType::class,[
                'class'=>Account::class,
                'choice_label'=>function($account){
                    return  $account->getOwner()->getFirstname().' '.$account->getOwner()->getLastname().' '.$account->getType();

                //    return $request->getIban();
                },
            ])
        ;*/
}
