<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AdvertController extends Controller {
	public function viewAction($id, Request $request) {
		// Récupération de la session 
		$session = $request->getSession();
		
		// On récupère le contenu de la variable user_id
		$userId = $session->get('user_id');
		
		// On définit une nouvelle valeur pour cette variable de session
		$session->set('user_id', 91);
		
		// On n'oublie pas de renvoyer une réponse
		return new Response('<body>Je suis une page de test sans grand-chose à dire</body>');
	}
}