<?php
namespace App\DataPersister;

use App\Entity\Transaction;
use App\Entity\User;
use App\Service\GenerateService;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Security;

final class TransactionDataPersister implements ContextAwareDataPersisterInterface
{
    private $em;
    private $genService;
    private $security;
    public function __construct(EntityManagerInterface $em, GenerateService $genService, Security $security){
        $this->em=$em;
        $this->genService=$genService;
        $this->security=$security;
    }
    public function supports($data, array $context = []): bool
    {
        return $data instanceof Transaction;
    }

    public function persist($data, array $context = [])
    {
        // call your persistence layer to save $data

        $user = $this->security->getUser();
        $frais=$this->genService->calculateFrais($data->getMontant());
        $parEtat = $frais * 40 / 100;
        $parEnt = $frais * 30 / 100;
        $parAgenceDepot= $frais * 10 / 100;
        $parAgenceRetrait= $frais * 20 / 100;

        $data->setPartEtat($parEtat);
        $data->setPartEnt($parEnt);
        $data->setPartAgenceRetrait($parAgenceRetrait);
        $data->setPartAgenceDepot($parAgenceDepot);
        $data->setUser($user);
        $data->setCompte(($user->getAgence()->getCompte()));
        $data->setCode($this->genService->generateCodeTransaction());
        $data->setIsRetired(false);
        $this->em->persist($data);
        $this->em->flush();

        return $data;
    }

    public function remove($data, array $context = [])
    {
        // call your persistence layer to delete $data

    }
}
