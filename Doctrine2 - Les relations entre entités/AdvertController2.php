<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

// N'oubliez pas ces use
use OC\PlatformBundle\Entity\Advert;
use OC\PlatformBundle\Entity\Application;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdvertController extends Controller {
	public function addAction(Request $request) {
		// Création de l'entité Advert
		$advert = new Advert();
		$advert->setTitle('Recherche développeur Symfony.');
		$advert->setAuthor('Alexandre');
		$advert->setContent("Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…");
		
		// Création d'une première candidature
		$application1 = new Application();
		$application1->setAuthor('Marc');
		$application1->setContent('J\'ai toutes les qualités requises');
		
		// Création d'une deuxième candidature par exemple 
		$application2 = new Application();
		$application2->setAuthor('Julien');
		$application2->setContent('Voilà voilà je souis prêt !!');
		
		// On lie les candidatures à l'annonce
		$application1->setAdvert($advert);
		$application2->setAdvert($advert);
		
		$em = $this->getDoctrine()->getManager();
		
		$em->persist($advert);
		
		// Pour cette relation pas de cascade lorsqu'on persiste Advert, car la relation est définie dans l'entité Application
		// et non Advert. On doit donc tout persister à la main ici.
		$em->persist($application1);
		$em->persist($application2);
		
		$em->flush();
		
		//...
	}
	
	public function viewAction($id) {
		$em = $this->get('doctrine.orm.entity_manager');
		
		$advert = $em->getRepository('OCPlatformBundle:Advert')->find($id);
		
		if($advert === null) 
			throw new NotFoundHttpException('L\'annonce d\'id '. $id . ' n\'existe pas.');
		
		// On récupère la liste des candidatures de cette annonce
		$listApplications = $em->getRepository('OCPlatformBundle:Application')
							 	->findBy(array('advert' => $advert));
		
		return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
				'advert' => $advert,
				'listApplications' => $listApplications
		));
	}
	
	public function editImageAction($advertId) {
		$em = $this->getDoctrine()->getManager();
		$advert = $em->find('OCPlatformBundle:Advert', $advertId);
		
		// On modifie l'URL de l'image par exemple :
		$advert->getImage()->setUrl('test.png');
		
		$em->flush();
		
		return Response('OK');
	}
	
	public function editAction($id, Request $request) {
		$em = $this->get('doctrine.orm.entity_manager');
		$advert = $em->find('OCPlatformBundle:Advert', $id);
		
		if($advert === null)
			throw new NotFoundHttpException("L'annonce d'id " . $id . " n'existe pas");
		
		// La méthode findAll retourne toutes les catégories de la base de données
		$listCategories = $em->getRepository('OCPlatformBundle:Category')->findAll();
		
		// On boucle sur les catégories pour les lier à l'annonce
		foreach($listCategories as $category) {
			$advert->addCategory($category);
		}
		
		// Pour persister le changement dans la relation, il faut persister l'entité propriétaire 
		// Ici, Advert est le propriétaire, donc inutile de la persister car on l'a récupérée depuis Doctrine
		$em->flush();
		
		//... reste de la méthode
	}
	
	public function deleteAction($id) {
		$em = $this->getDoctrin()->getManager();
		$advert = $em->getRepository('OCPlatformBundle:Advert')->find($id);
		
		if($advert === null)
			throw new NotFoundHttpException("L'annonce d'id " . $id . " n'existe pas");
		
		// On boucle les catégories de l'annonce pour les supprimer
		foreach($advert->getCategories() as $category)
			$advert->removeCategory($category);
		
		// Pour persister le changement dans la rédaction, il faut persister l'entité propriétaire
		// Ici, Advert est le propriétaire, donc inutile de la persister car on l'a  récupérée depuis Doctrine
		
		// On déclenche la modification
		$em->flush();
		
		//...
	}
}