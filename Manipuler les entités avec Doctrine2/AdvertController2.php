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
		
		$advert2 = $em->getRepository('OCPlatformBundle:Advert')->find(5);
		
		// Petite modif
		$advert2->setDate(new \DateTime());
		
		// Ici, pas besoin de faire un persist() sur $advert2. En effet, comme on a récupéré cette annonce via Doctrine, il sait déjà qu'il doit
		// gérer cette entité. Rappel : un persist() ne sert qu'à donner la responsabilité de l'objet à Doctrine
		
		// Etape 2 : on applique les deux changements à la base de données : un INSERT INTO pour $advert et un UPDATE pour $advert2
		$em->flush();
		
		// Reste de la méthode déjà écrite :
		if($request->isMethod('POST')) {
			$request->getSession()->getFlashbag()->add('Notice', 'Annonce bien enregistrée');
			
			return $this->redirectToRoute('oc_platform_view', array('id' => $adver->getId()));
		}
		
		return $this->render('OCPlatformBundle:Advert:add.html.twig', array('advert' => $advert)); 
	}
}