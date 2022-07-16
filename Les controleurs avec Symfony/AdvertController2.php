<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FramworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse; // IL ne faut pas oublier ce use 

class AdvertController extends Controller {
	public function viewAction($id) {
		$url = $this->get('router')->generate('oc_platform_home');
		
		return new RedirectResponse($url);
	}
}