<?php

namespace App\Controller;

use App\Repository\TransactionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TransactionController extends AbstractController
{
    /**
     * @Route("/api/transactions/getbycode", name="getBycode", methods={"POST"})
     */
    public function getInfos(Request $request, TransactionRepository $repo)
    {
        $data=json_decode($request->getContent(),true);
        $code=$data["code"];
            $transaction = $repo->findByCode($code);
            if ($transaction){
                return $transaction;
            }


        return new JsonResponse(["message"=>"COde invalide",Response::HTTP_BAD_REQUEST]);




    }

}
