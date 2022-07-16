<?php
// src/OC/PlatformBundle/Bigbrother/MessageListener.php

namespace OC\PlatformBundle\Bigbrother;

use OC\PlatformBundle\Event\MessagePostEvent;

class MessageListener {
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
}