<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

// N'oubliez pas ces use
use OC\PlatformBundle\Entity\Advert;
use OC\PlatformBundle\Entity\AdvetSkill;
use OC\PlatformBundle\Entity\Application;
use OC\PlatformBundle\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdvertController extends Controller {
	public function addAction(Request $request) {
		// Création de l'entité Advert
		$advert = new Advert();
		$advert->setTitle('Recherche développeur Symfony.');
		$advert->setAuthor('Alexandre');
		$advert->setContent("Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…");
		
		$em = $this->getDoctrine()->getManager();
		
		$listSkills = $em->getRepository('OCPlatformBundle:Skill')->findAll();
		$levels = ['Débutant', 'Intermédiaire', 'Confirmé', 'Expert'];
		// Pour chaque compétence :
		foreach($listSkills as $skill) {
			// On crée une nouvelle relation entre 1 annonce et 1 compérence
			$advertSkill = new AdvertSkill();
			// On la lie à l'annonce, qui est ici toujours la même.
			$advertSkill->setAdvert($advert);
			// On la lie à la compétnce, qui change ici dans la boucle foreach
			$advertSkill->setSkill($skill);
			
			$advertSkill->setLevel($levels[rand(0, 3)]);
			
			// Et bien sûr, on persiste cette cette entité de relation, propriétaire des deux autres relations
			$em->persist($advertSkill);			
		}
		// Doctrine ne connaît pas encore l'entité $advert. Si je n'ai pas la relation AdvertSkill avec un cascade persist (ce qui
		// est le cas ici), alors on doit persister $advert
		$em->persist($advert);
		
		$em->flush();
		
		// reste...
		
	}
	
	public function viewAction($id) {
		$em = $this->get('doctrine.orm.entity_manager');
		
		$advert = $em->getRepository('OCPlatformBundle:Advert')->find($id);
		
		if($advert === null) 
			throw new NotFoundHttpException('L\'annonce d\'id '. $id . ' n\'existe pas.');
		
		// On récupère la liste des candidatures de cette annonce
		$listApplications = $em->getRepository('OCPlatformBundle:Application')
							 	->findBy(array('advert' => $advert));
		
		// on récupère maintenant la liste des AdvertSkill
		$listAdvertSkills = $em->getRepository('OCPlatformBundle:AdvertSkill')
							   ->findBy(array('advert' => $advert));
		
		return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
				'advert' => $advert,
				'listApplications' => $listApplications,
				'listAdvertSkills' => $listAdvertSkills
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