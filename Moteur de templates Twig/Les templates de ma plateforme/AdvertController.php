<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller {
	
	// ...
	
	public function menuAction($limit) {
		// On fixe en dur une liste ici, pour faire genre
		
		$listeAdverts = array(
				array('id' => 2, 'title' => 'Recherche développeur Symfony'),
				array('id' => 3, 'title' => 'Mission de webmaster'),
				array('id' => 7, 'title' => 'Offre de stage webdesigner')
		);
		
		return $this->render('OCPlatformBundle:Advert:menu.html.twig', array(
				// Tout l'intérêt est ici, le contrôleur passe les variables nécessaires au template
				'listeAdverts' => $listeAdverts
		));
	}
	
	public function indexAction($page) {
		if($page < 1)
			// On déclenche une exception NotFoundHttpException, cela va afficher
			// une page d'erreur 404 (qu'on pourra personnaliser plus tard d'ailleurs) 
			throw new NotFoundHttpException('Page '.$page.' inexistante');
		// Ma liste d'annonces fictives
		$listAdverts = array(
				array(
						'title'   => 'Recherche développpeur Symfony',
						'id'      => 1,
						'author'  => 'Alexandre',
						'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
						'date'    => new \Datetime()),
				array(
						'title'   => 'Mission de webmaster',
						'id'      => 2,
						'author'  => 'Hugo',
						'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
						'date'    => new \Datetime()),
				array(
						'title'   => 'Offre de stage webdesigner',
						'id'      => 3,
						'author'  => 'Mathieu',
						'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
						'date'    => new \Datetime())
		);
		
		// Et modifiez le 2nd argument pour injecter notre liste
		return $this->render('OCPlatformBundle:Advert:index.html.twig', array(
				'listAdverts' => $listAdverts
		));
	}
	
	public function viewAction($id) {
		$advert = array(
				'title'   => 'Recherche développpeur Symfony2',
				'id'      => $id,
				'author'  => 'Alexandre',
				'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
				'date'    => new \Datetime()
		);
		
		return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
				'advert' => $advert
		));
	}
	
	public function editAction($id, Request $request) {
		if($request->isMethod('POST')) {
			$request->getSession()->getFlashBag()->add('Notice', 'Annonce bien modifiée');
			return $this->redirectToRoute('oc_platform_view', array('id' => $id));
		}
		
		$advert = array(
				'title'   => 'Recherche développpeur Symfony',
				'id'      => $id,
				'author'  => 'Alexandre',
				'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
				'date'    => new \Datetime()
		);
		
		return $this->render('OCPlatformBundle:Advert:edit.html.twig', array(
				'advert' => $advert
		));
	}
	
	public function addAction(Request $request) {
		if($request->isMethod('POST')) {
			$request->getSession()->getFlashBag()->add('Notice', 'Annonce bien ajoutée');
			return $this->redirectToRoute('oc_platform_view', array('id' => 5));
		}
		
		// Si on n'est pas en POST, alors on affiche le formulaire
		return $this->render('OCPlatformBundle:Advert:add.html.twig');
	}
	
	public function deleteAction($id) {
		// Ici, récupération de l'annonce dont l'id est spécifié
		// Ici, suppression
		$advert = array('title' => 'sbim');
		return $this->render('OCPlatformBundle:Advert:delete.html.twig', array('advert' => $advert));
	}
}