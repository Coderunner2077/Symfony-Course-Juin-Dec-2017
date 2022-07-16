<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FramworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdvetController extends Controller {
	public function viewAction($id) {
		// Je crée moi-même la réponse en JSON, grâce à la fonction json_encode
		$response = new Response(json_encode(array('id' => $id)));
		
		// Ici, je définis le Content-type pour dire au navigateur que l'on renvoie du JSON et non du HTML
		$response->headers->set('Content-Type', 'application/json');
		
		return $response;
	}
}