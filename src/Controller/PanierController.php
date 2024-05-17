<?php

namespace App\Controller;

use App\Entity\Panier;
use App\Entity\Lampe;
use App\Entity\Ajouter;
use App\Repository\LampeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class PanierController extends AbstractController
{
    #[Route('/panier',name:'app_panier')]
    public function Panier(LampeRepository $lampeRepository):Response
    {
        $lampe = $lampeRepository->findAll();
        $panier = $this->getUser()->getPanier()->getAjouters();
        return $this->render('panier/panier.html.twig',[
            'panier' => $panier,
            'lampes' => $lampe,
        ]);
    }

    #[Route('/private-ajout-panier-lampe/{id}', name:'app_ajout_panier_lampe')]
    public function ajoutPanierLampe(Request $request, Lampe $lampe, EntityManagerInterface $em): Response
    {
        if($lampe!=null){
            if($this->getUser()->getPanier()==null){
                $panier = new Panier();
            } else {
                $panier = $this->getUser()->getPanier();
            }
            $ajouter = new Ajouter();
            $ajouter->setPanier($panier);
            $ajouter->setLampe($lampe);
            $ajouter->setQuantite(1);
            $panier->addAjouter($ajouter);
            $this->getUser()->setPanier($panier);
            $em->persist($ajouter);
            $em->persist($panier);
            $em->persist($this->getUser());
            $em->flush();
            $this->addFlash('notice', 'Lampe Ajoutée');
        }
        return $this->redirectToRoute('app_panier');
    }
    #[Route('/private-supp-panier-lampe/{id}', name:'app_supp_panier_lampe')]
    public function suppPanierAccueil(Lampe $lampe, EntityManagerInterface $em): Response
    {
        foreach ($this->getUser()->getPanier()->getAjouters() as $a) {
            if ($this->getUser()->getPanier()->getAjouters()->contains($a)){
                if ($a->getLampe() == $lampe){
                    $this->getUser()->getPanier()->removeAjouter($a);
                    $this->addFlash('error', 'Votre produit a bien été retiré du panier');
                }
            }
        }
        $em->persist($this->getUser());
        $em->flush();
        return $this->redirectToRoute('app_accueil');
    }
}