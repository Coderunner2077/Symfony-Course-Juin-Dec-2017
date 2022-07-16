<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller {
	public function indexAction($page) {
		if($page < 1)
			// On déclenche une exception NotFoundHttpException, cela va afficher
			// une page d'erreur 404 (qu'on pourra personnaliser plus tard d'ailleurs) 
			throw new NotFoundHttpException('Page "'.$page.'" inexistante'); 
		
		// Ici on récupère la liste des annonces, puis on la passera au template
		// Mais pour l'instant, on ne fait qu'appeler le template
		return $this->render('OCPlatformBundle:Advert:index.html.twig', array('nom' => 'Moto'));
	}
	
	public function viewAction($id) {
		
		// Ici, on récupérera l'annonce correspondant à l'id $id
		return $this->render('OCPlatformBundle:Advert:view.html.twig', array('id' => $id));
	}
	
	public function addAction(Request $request) {
		// Si formulaire soumis
		if($request->isMethod('POST')) {
			// ici, création et gestion de formulaire
			$request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
			
			// Puis, on redirige vers la page de visualisation de cette annonce
			return $this->redirectToRoute('oc_platform_view', array('id' => 5));
		}
		
		// Si on n'est pas en POST, alors on affiche le formulaire
		return $this->render('OCPlatformBundle:Advert:add.html.twig');
	}
	
	public function editAction($id, Request $request) {
		// Ici on récupérera l'annonce correspondante à l'$id
		
		// Même mécanisme que pour l'ajout
		if($request->isMethod('POST')) {
			$request->getSession()->getFlashBag()->add('Notice', 'Annonce bien modifiée');
			return $this->redirectToRoute('oc_platform_view', array('id' => $id));
		}
		
		return $this->render('OCPlatformBundle:Advert:edit.html.twig');
	}
	
	public function deleteAction($id) {
		// Ici, récupération de l'annonce dont l'id est spécifié
		// Ici, suppression
		
		return $this->render('OCPlatformBundle:Advert:delete.html.twig');
	}
}