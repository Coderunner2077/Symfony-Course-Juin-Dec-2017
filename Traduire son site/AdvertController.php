<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

// ...
class AdvertController extends Controller {
	public function translationAction($name) {
		return $this->render('OCPlatformBundle:Advert:translation.html.twig', array(
				'name' => $name
		));
	}
}