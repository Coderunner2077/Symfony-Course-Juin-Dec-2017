<?php
// src/OC/PlatformBundle/DoctrineListener/ApplicationCreationListener.php

namespace OC\PlatformBundle\DoctrineListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use OC\PlatformBundle\Email\ApplicationMailer;
use OC\PlatformBundle\Entity\Application;

class ApplicationCreationListener {
	/**
	 * @var ApplicationMailer
	 */
	private $applicationMailer;
	
	public function __construct(ApplicationMailer $appMailer) {
		$this->applicationMailer = $appMailer;
	}
	
	public function postPersist(LifecycleEventArgs $args) {
		$entity = $args->getObject();
		if(!$entity instanceof Application) {
			return;
		}
		
		$this->applicationMailer->sendNewNotification($entity);
	}
}