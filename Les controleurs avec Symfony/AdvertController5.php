<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FramworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller {
	public function viewAction($id) {
		return $this->render('OCPlatformBundle:Advert:view.html.twig', array('id' => $id));
	}
	
	public function addAction(Request $request) {
		$session = $request->getSession();
		
		// Bien sûr, cette méthode devra réellement ajouter l'annonce
		
		// Mais, faisons comme si c'était le cas 
		$session->getFlashBag()->add('info', 'Annonce bien enregistrée');
		
		// Le "flashBag" est ce qui contient les messages flash dans la session
		// Il peut bien sûr contenir plusieurs messages
		$session->getFlashBag()->add('Info', 'oui oui bien enregistrée oui');
		
		// Puis, on redirige vers la page de visualisation de cette annonce
		return $this->redirectToRoute('oc_platform_view', array('id' => 5));
	}
}