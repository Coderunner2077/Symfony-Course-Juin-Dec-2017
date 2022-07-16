<?php
// src/OC/PlatformBundle/Advert/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use OC\PlatformBundle\Entity\Advert;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdvertController extends Controller {
	public function addAction(Request $request) {
		// Création de l'entité
		$advert = new Advert();
		$advert->setTitle('Recherche développeur Symfony.');
		$advert->setAuthor('Alexandre');
		$advert->setContent("Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…");
		
		$em = $this->getDoctrine()->getManager();
		
		// Etape 1 : On "persiste" l'entité
		$em->persist($advert);
		
		// Etape 2 : On "flush" tout ce qui a été persisté avant
		$em->flush();
		
		// Reste de la méthode déjà écrite :
		if($request->isMethod('POST')) {
			$request->getSession()->getFlashbag()->add('Notice', 'Annonce bien enregistrée');
			
			return $this->redirectToRoute('oc_platform_view', array('id' => $adver->getId()));
		}
		
		return $this->render('OCPlatformBundle:Advert:add.html.twig', array('advert' => $advert)); 
	}
}