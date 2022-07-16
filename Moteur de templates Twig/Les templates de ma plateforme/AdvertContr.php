<?php
// src/OC/PlatformBundle/Controller/AdvertController.php
new class {
	public function menuAction($limit) {
		// On fixe en dur une liste ici, pour faire genre
		$listAdverts = array(
				array('id' => 2, 'title' => 'Recherche développeur Symfony'),
				array('id' => 5, 'title' => 'Mission de webmaster'),
				array('id' => 9, 'title' => 'Offre de stage webdesigner')
		);
		
		return $this->render('OCPlatformBundle:Advert:menu.html.twig', array(
				// Tout l'intérêt est ici : le contrôleur passe
				// les variables nécessaires au template !
				'listAdverts' => $listAdverts
		));
	}
};
