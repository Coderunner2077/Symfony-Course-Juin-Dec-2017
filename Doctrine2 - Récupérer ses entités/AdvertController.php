<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use OCPlatformBundle\Entity\Advert;

class AdvertController extends Controller {
	public function listAction() {
		$listAdverts = $this->getDoctrine()
							->getManager()
							->getRepository('OCPlatformBundle:Advert')
							->getAdvertWithApplications();
		
		foreach($listAdverts as $advert) {
			// Ne déclenche pas de requête : les candidatures sont déjà chargées !
			// Je pourrais faire une boucle dessus pour les afficher toutes
			$advert->getApplications();
		}
		
		//...
	}
}