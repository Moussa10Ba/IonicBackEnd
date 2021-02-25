<?php

namespace App\DataFixtures;

use App\Entity\Profil;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProfilFixture extends Fixture
{
    public const PROFIL_ADMIN_SYSTEME_REFERENCE = 'profil_adminsysteme';
    public const PROFIL_ADMIN_AGENCE_REFERENCE = 'profil_adminagence';
    public const PROFIL_UTILISATEUR_AGENCE_REFERENCE  = 'profil_utilisateuragence';
    public const PROFIL_CAISSIER_REFERENCE = 'profil_caissier';
    public function load(ObjectManager $manager)
    {
        $tab=["AdminSysteme","AdminAgence","UtilisateurAgence","Caissier"];
        for ($i=1; $i <=4 ; $i++) {
            $profil = new Profil();
            if ($i==1) {
                $profil->setLibelle("AdminSysteme");
                $profil->setArchiver(false);
                $this->addReference(self::PROFIL_ADMIN_SYSTEME_REFERENCE, $profil);

            }if ($i==2) {
                $profil->setLibelle("AdminAgence");
                $this->addReference(self::PROFIL_ADMIN_AGENCE_REFERENCE, $profil);
            }if ($i==3) {
                $profil->setLibelle("UtilisateurAgence");
                $profil->setArchiver(false);
                $this->addReference(self::PROFIL_UTILISATEUR_AGENCE_REFERENCE, $profil);
            }if ($i==4) {
                $profil->setLibelle("Caissier");

                $this->addReference(self::PROFIL_CAISSIER_REFERENCE, $profil);
            }
            $manager->persist($profil);
        }

        $manager->flush();
    }
}
