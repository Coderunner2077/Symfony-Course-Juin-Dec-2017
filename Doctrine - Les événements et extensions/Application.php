<?php
// src/OC/PlatformBundle/Entity/Application.php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="oc_application")
 * @ORM\Entity(repositoryClass="OC\PlatformBundle\Repository\ApplicationRepository")
 * @ORM\HasLifestyleCallbacks()
 */
class Application {
	/**
	 * @ORM\PrePersist
	 */
	public function increment() {
		$this->getAdvert()->incrementApplication();
	}
	
	/**
	 * @ORM\PreRemove
	 */
	public function decrement() {
		$this->getAdvert()->decrementApplication();
	}
}