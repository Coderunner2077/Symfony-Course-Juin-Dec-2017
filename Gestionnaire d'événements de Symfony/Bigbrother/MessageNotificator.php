<?php
// src/OC/PlatformBunde/Bigbrother/MessageNotificator.php

namespace OC\PlatformBundle\Bigbrother;

use Symfony\Component\Security\Core\User\UserInterface;

class MessageNotificator {
	protected $mailer;
	
	public function __consruct(\Swift_Mailer $mailer) {
		$this->mailer = $mailer;
	}
	
	// Méthode pour notifier par e-mail un administrateur
	public function notifyByEmail($message, UserInterface $user) {
		$message = \Swift_Message::newInstance()
			->setSubject("Nouveau Message d'un utilisateur surveillé")
			->setFrom('admin@monsite.com')
			->setTo('admin@monsite.com')
			->setBody("L'utilisateur surveillé '" . $user->getUsername() . "' a posté le messsage suivant : '" . $message."'");
		
		$this->mailer->send($message);
	}
}