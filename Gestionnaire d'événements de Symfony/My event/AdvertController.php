<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use OC\PlatformBundle\Event\PlatformEvents;
use OC\PlatformBundle\Event\MessagePostEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdvertController extends Controller {
	public function addAction(Request $request) {
		// ...
		
		if($form->handleRequest($request)->isValid()) {
			// On crée l'évènement avec ses deux arguments
			$event = new MessagePostEvent($advert->getContent(), $advert->getUser());
			
			// On déclenche l'évènement
			$this->get('event_dispatcher')->dispatch(PlatformEvents::POST_MESSAGE, $event);
			
			// On récèpère ce qui a été modifié par le ou les listeners, ici le message
			$advert->setContent($event->getMessage());
			
			$em = $this->getDoctrine()->getManager();
			$em->persist($advert);
			$em->flush();
			
			// ...
		}
	}
}