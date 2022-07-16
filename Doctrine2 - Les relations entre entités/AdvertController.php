<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

// N'oubliez pas ces use
use OC\PlatformBundle\Entity\Advert;
use OC\PlatformBundle\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdvertController extends Controller {
	public function addAction(Request $request) {
		// Création de l'entité Advert
		$advert = new Advert([
				'title' => 'Recherche développeur Symfony.',
    			'author' => 'Alexandre',
    			'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…'
		]);
		
		// Création de l'entité Image
		$image = new Image([
				'url' => 'http://sdz-upload.s3.amazonaws.com/prod/upload/job-de-reve.jpg',
    			'alt' => 'Job de rêve'
		]);
		
		$advert->setImage($image);
		
		$em = $this->getDoctrine()->getManager();
		
		$em->persist($advert);
		
		// ayant défini le cascade={"persist"}), pas la peine de faire persist($image)
		$em->flush();
		
		//...
	}
	
	public function editImageAction($advertId) {
		$em = $this->getDoctrine()->getManager();
		$advert = $em->find('OCPlatformBundle:Advert', $advertId);
		
		// On modifie l'URL de l'image par exemple :
		$advert->getImage()->setUrl('test.png');
		
		$em->flush();
		
		return Response('OK');
	}
}