<?php
namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class GenerateService {

    public function generateCodeTransaction(){
       return uniqid ( "Trans");
    }

    public function generateCodeCompte(){
        return uniqid ( "Co" , true);
    }

    public function calculateFrais($montant){
        $max_Array=[5000,10000,15000,20000,50000,60000,75000,120000,150000,200000,250000
        ,300000,400000,750000,900000,1000000,1125000,14000000,20000000];
        $frais_Array=[425,850,1270,1695,2500,3000,4000,5000,6000,7000,8000,9000,12000,15000,22000,25000,27000
        ,30000,30000];
        $i=0;
        while ($montant>$max_Array[$i] && $i<count($max_Array))$i++;
        if ($i<count($max_Array)){
            return $frais_Array[$i];
        }
        return ($montant*0.02);
    }

}
