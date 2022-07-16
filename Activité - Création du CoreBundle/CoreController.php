<?php
namespace CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoreController extends Controller {
	
	public function indexAction() {
		$listAdverts = array(
				array(
						'title'   => 'Recherche développpeur Symfony',
						'id'      => 1,
						'author'  => 'Alexandre',
						'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
						'date'    => new \Datetime()),
				array(
						'title'   => 'Mission de webmaster',
						'id'      => 2,
						'author'  => 'Hugo',
						'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
						'date'    => new \Datetime()),
				array(
						'title'   => 'Offre de stage webdesigner',
						'id'      => 3,
						'author'  => 'Mathieu',
						'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
						'date'    => new \Datetime())
		);
		
		$messagesForum = array(
				array(
						'title'   => 'Question relative aux bundles de Symfony',
						'id'      => 5,
						'author'  => 'Gérard',
						'content' => 'Est-il obligatoire de créer la classe DependencyInjection ? ',
						'date'    => new \Datetime()),
				array(
						'title'   => 'Débouchés d\'un DUT Informatique',
						'id'      => 2,
						'author'  => 'Hugo',
						'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
						'date'    => new \Datetime()),
				array(
						'title'   => 'Par rapport à un stage webdesigner',
						'id'      => 3,
						'author'  => 'Mathieu',
						'content' => 'Qui propose un poste pour webdesigner. Blablaa ? ',
						'date'    => new \Datetime())
		);
		return $this->render('CoreBundle:Core:index.html.twig', ['listAdverts' => $listAdverts, 'messagesForum' => $messagesForum]);
	}
	
	public function contactAction(Request $request) {
		$request->getSession()->getFlashbag()->add('Notice', 'Toutes nos excuses, cette page n\'étant pas encore prête');
		
		if($request->isMethod('POST')){
			// TRAITEMENT
		}
		else {
			
			return $this->render('CoreBundle:Core:contact.html.twig');
		}
			
	}
}