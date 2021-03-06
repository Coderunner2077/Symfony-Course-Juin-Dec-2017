<?php
// OC\PlatformBunde\Event\MessagePostEvent.php

namespace OC\PlatformBundl\Event;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Security\Core\User\UserInterface;

class MessagePostEvent extends Event {
	protected $message,
			  $user;
	
	public function __construct($message, UserInterface $user) {
		$this->message = $message;
		$this->user = $user;
	}
	
	// Le listener doit avoir accès au message
	public function getMessage()
	{
		return $this->message;
	}
	
	// Le listener doit pouvoir modifier le message
	public function setMessage($message)
	{
		return $this->message = $message;
	}
	
	// Le listener doit avoir accès à l'utilisateur
	public function getUser()
	{
		return $this->user;
	}
	
	// Pas de setUser, le listener ne doit pas pouvoir modifier l'auteur du message
}