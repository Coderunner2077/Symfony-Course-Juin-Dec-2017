<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller {
	
	public function indexAction() {
		// On veut avoir l'URL de l'annonce d'id 5
		$url = $this->get('router')->generate(
				'oc_platform_view',	// 1er argument: le nom de la route
				array('id' => 5)	// 2e argument: les valeurs des paramètres
				);
		
		// $url vaut "/platform/advert/5"
		
		return new Response("L'URL de l'annonce d'id 5 est : ".$url);
	}
}