<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller {
	public function viewAction($id, Request $request) {
		$tag = $request->query->get('tag');
		
		return new Response(
				"Affichage de l'annonce d'id : ".$id.", avec le tag : ".$tag
		);
	}
}