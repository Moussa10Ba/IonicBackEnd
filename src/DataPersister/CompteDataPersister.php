<?php
namespace App\DataPersister;

use App\Entity\Compte;
use App\Service\GenerateService;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class CompteDataPersister implements ContextAwareDataPersisterInterface
{
    private $em;
    private $generateService;
    public function __construct(EntityManagerInterface $em, GenerateService $generateService){
        $this->em=$em;
        $this->generateService=$generateService;
    }
    public function supports($data, array $context = []): bool
    {

        return $data instanceof Compte;
    }

    public function persist($data, array $context = [])
    {

       // dd($data->setCode($this->generateService->generateCodeCompte()));
        // call your persistence layer to save $data
        $data->setCode($this->generateService->generateCodeCompte());
        if($data->getMontant() < 700000){
            return new JsonResponse(["message"=>"Un montant minimum de 700000 fca est requis"],Response::HTTP_BAD_REQUEST);
        }

        $this->em->persist($data);
        $this->em->flush();

        return $data;
    }

    public function remove($data, array $context = [])
    {
        // call your persistence layer to delete $data

        $data->setArchiver(true);
        /*foreach ($data->get() as $user){
            $user->setArchive(true);
        }*/
        $this->em->persist($data);
        $this->em->flush();

    }
}
