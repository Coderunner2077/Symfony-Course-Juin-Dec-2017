<?php
// src/OC/PlatformBundle/Bigbrother/MessageListener.php

namespace OC\PlatformBundle\Bigbrother;

class MessagePostEvent{ }
interface EventSubscriberInterface {}
class PlatformEvents {}
//use OC\PlatformBundle\Event\MessagePostEvent;
//use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MessageListener implements EventSubscriberInterface {
	protected $messageNotificator;
	protected $listUsers = array();
	
	public function __construct(MessageNotificator $messageNotificator, array $listUsers) {
		$this->messageNotificator = $messageNotificator;
		$this->listUsers = $listUsers;
	}
	
	public function processMessage(MessagePostEvent $event) {
		if(in_array($event->getUser()->getUsername(), $this->listUsers))
			$this->messageNotificator->notifyByEmail($event->getMessage(), $event->getUser()); // envoi d'un e-mail à l'administrateur
	}
	
	// La méthode de l'interface que l'on doit implémenter
	static public function getSubscribedEvents() {
		// On retourne un tableau "nom de l'événement" => ["nom de la méthode à exécuter", priorité ]
		return array(
				PlatformEvents::POST_MESSAGE => array('processMessage', 2)
		);
	}
}