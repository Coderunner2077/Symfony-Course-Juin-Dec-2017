<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FramworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdvertController extends Controller {
	// ...
	
	public function addAction(Request $request) {
		// On récupère le service
		$antispam = $this->container->get('oc_platform.antispam');
		
		// Je pars du principe que $text contient le texte d'un message quelconque
		$text = '...';
		if($antispam->isSpam($text)) 
			throw new \Exception('Mon message a été détecté comme span !');
		
		// Ici le message n'est pas un spam
		// ...
	}
}