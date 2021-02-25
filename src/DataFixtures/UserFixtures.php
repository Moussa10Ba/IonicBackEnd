<?php

namespace App\DataFixtures;

use App\Entity\useristrateur;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    protected $faker;
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create();
        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $password = $this->encoder->encodePassword($user, "passer");
            $user->setPassword($password);
            $user->setArchiver(false);
            $user->setPrenom($faker->firstNameMale);
            $user->setNom($faker->lastName);
            $user->setEmail($faker->email);
            $user->setTelephone($faker->phoneNumber);
            if ($i===0){
                $user->setProfil($this->getReference(ProfilFixture::PROFIL_ADMIN_SYSTEME_REFERENCE));
            }
            if ($i===1){
                $user->setProfil($this->getReference(ProfilFixture::PROFIL_ADMIN_AGENCE_REFERENCE));
            }
            if ($i===3){
                $user->setProfil($this->getReference(ProfilFixture::PROFIL_UTILISATEUR_AGENCE_REFERENCE));
            }
            if ($i===4){
                $user->setProfil($this->getReference(ProfilFixture::PROFIL_CAISSIER_REFERENCE));
            }
            $manager->persist($user);

        }
        $manager->flush();
    }
    public function getDependencies()
    {
        // TODO: Implement getDependencies() method.
        return array(
            ProfilFixture::class,
        );
    }
}
