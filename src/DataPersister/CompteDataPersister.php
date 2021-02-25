<?php
namespace App\DataPersister;

use App\Entity\Compte;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;

final class CompteDataPersister implements ContextAwareDataPersisterInterface
{
    private $em;
    public function __construct(EntityManagerInterface $em){
        $this->em=$em;
    }
    public function supports($data, array $context = []): bool
    {
        return $data instanceof Compte;
    }

    public function persist($data, array $context = [])
    {
        // call your persistence layer to save $data
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
