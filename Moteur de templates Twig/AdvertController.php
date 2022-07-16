<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller {
	
	// ...
	
	public function menuAction() {
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
}