<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\LampeRepository;
use App\Entity\Lampe;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ModifierProduitType;
use App\Form\SupprimerProduitType;
use App\Form\ContactType;
use App\Form\AjoutProduitType;
use Symfony\Component\String\Slugger\SluggerInterface;

class BaseController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [
        ]);
    }
    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        $form = $this->createForm(ContactType::class);
        return $this->render('base/contact.html.twig', [
        'form' => $form->createView()
    ]);
    }
    #[Route('/produit', name: 'app_produit')]
    public function produit(LampeRepository $LampeRepository): Response
    {
        $lampe = $LampeRepository->findAll();
        return $this->render('base/produit.html.twig', [
            'lampes' => $lampe ,
        ]);
    }
    #[Route('/admin-listeProduit', name: 'app_liste_produit', methods: ['GET', 'POST'])]
    public function listeProduit(Request $request, LampeRepository $lampeRepository,
    EntityManagerInterface $em): Response
    {

        $lampe = $lampeRepository->findAll();
        return $this->render('base/admin-listeProduit.html.twig', [
            'lampes' => $lampe ,
        ]);
    }
    #[Route('/modifier-produit/{id}', name: 'app_modifier_produit')]
    public function modifierProduit(Request $request,Lampe $lampe,EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ModifierProduitType::class, $lampe);
        if($request->isMethod('POST')){
        $form->handleRequest($request);
        if ($form->isSubmitted()&&$form->isValid()){
        $em->persist($lampe);
        $em->flush();
        $this->addFlash('notice','Produit modifiée');
        return $this->redirectToRoute('app_liste_produit');
        }
        }
        return $this->render('base/modifier-produit.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Route('/supprimer-produit/{id}', name: 'app_supprimer_produit')]
    public function supprimerProduit(Request $request,Lampe $lampe,EntityManagerInterface $em): Response
    {
        if($lampe!=null){
            $em->remove($lampe);
            $em->flush();
            $this->addFlash('notice','Catégorie supprimée');
        }
        return $this->redirectToRoute('app_liste_produit');
    }
    #[Route('/admin-ajoutProduit', name: 'app_ajout_produit')]
    public function ajoutProduit(Request $request,EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(AjoutProduitType::class);
        if($request->isMethod('POST')){
        $form->handleRequest($request);
        if ($form->isSubmitted()&&$form->isValid()){
        $em->flush();
        $this->addFlash('notice','Produit ajouté');
        return $this->redirectToRoute('app_ajout_produit');
        }
        }
        return $this->render('base/admin-ajoutProduit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
