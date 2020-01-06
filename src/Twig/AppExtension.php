<?php

namespace App\Twig;

use Twig\TwigFunction;
use Proxies__CG\App\Entity\Transaction;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Twig\Extension\AbstractExtension;

class AppExtension extends AbstractExtension
{

    protected $doctrine;

    public function construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('getTransactionByAccountAndCat', [$this, 'getTransactionByAccountAndCat']),
        ];
    }

    public function getTransactionByAccountAndCat($account, $category)
    {
        $transacRepository = $this->doctrine->getRepository(Transaction::class);
        return $transacRepository->findByAccountAndCat($account,$category);
    }
}