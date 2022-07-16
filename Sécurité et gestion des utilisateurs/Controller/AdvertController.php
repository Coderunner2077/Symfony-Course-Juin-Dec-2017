<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkExtraBundle\Configuration\Security; // !important

class AdvertController extends Controller {
	/**
	 * @Security("has_role('ROLE_AUTEUR')")
	 */
	public function addAction(Request $request ) {
		// Plus besin du if avec le security.context, l'annotation s'occupe de tout !
		// Dans cette méthode, je suis sûr que l'utiliateur courant dispose du rôle ROLE_AUTEUR
	}
}