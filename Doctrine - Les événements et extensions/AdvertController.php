<?php
// dans un contrôleur
class AdvertController {
	public function testAction() {
		$advert = new Advert();
		$advert->setTitle('Recherche développeur !');
		$em = $this->getDoctrine()->getManager();
		$em->persist($advert);
		$em->flush(); // C'est à ce moment qu'est généré le slug
		
		return new Response('Slug généré : ' . $advert->getSlug());
		// Affiche "Slug généré : recherche-developpeur"
	}
}
