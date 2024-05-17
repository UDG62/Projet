<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\LampeRepository;
use App\Repository\TypeLampeRepository;

class LampeController extends AbstractController
{
    #[Route('/lampe-incandescente', name: 'app_lampe_incandescente')]
    public function lampeIncandescente(LampeRepository $LampeRepository, TypeLampeRepository $TypeLampeRepository): Response
    {
        $lampe = $LampeRepository->findAll();
        $typeLampe = $TypeLampeRepository->findAll();
        return $this->render('lampe/lampe_incandescente.html.twig', [
            'lampes' => $lampe ,
            'typeLampes'=> $typeLampe,
        ]);
    }
    #[Route('/lampe-halogene', name: 'app_lampe_halogene')]
    public function lampeHalogene(LampeRepository $LampeRepository, TypeLampeRepository $TypeLampeRepository): Response
    {
        $lampe = $LampeRepository->findAll();
        $typeLampe = $TypeLampeRepository->findAll();
        return $this->render('lampe/lampe_halogene.html.twig', [
            'lampes' => $lampe ,
            'typeLampes'=> $typeLampe,
        ]);
    }
    #[Route('/lampe-fluocompacte', name: 'app_lampe_fluocompacte')]
    public function lampeFluoCompacte(LampeRepository $LampeRepository, TypeLampeRepository $TypeLampeRepository): Response
    {
        $lampe = $LampeRepository->findAll();
        $typeLampe = $TypeLampeRepository->findAll();
        return $this->render('lampe/lampe_fluocompacte.html.twig', [
            'lampes' => $lampe ,
            'typeLampes'=> $typeLampe,
        ]);
    }
    #[Route('/lampe-led', name: 'app_lampe_led')]
    public function lampeLed(LampeRepository $LampeRepository, TypeLampeRepository $TypeLampeRepository): Response
    {
        $lampe = $LampeRepository->findAll();
        $typeLampe = $TypeLampeRepository->findAll();
        return $this->render('lampe/lampe_LED.html.twig', [
            'lampes' => $lampe ,
            'typeLampes'=> $typeLampe,
        ]);
    }
    #[Route('/lampe-streaming', name: 'app_lampe_streaming')]
    public function lampeStreaming(LampeRepository $LampeRepository, TypeLampeRepository $TypeLampeRepository): Response
    {
        $lampe = $LampeRepository->findAll();
        $typeLampe = $TypeLampeRepository->findAll();
        return $this->render('lampe/lampe_streaming.html.twig', [
            'lampes' => $lampe ,
            'typeLampes'=> $typeLampe,
        ]);
    }
}
