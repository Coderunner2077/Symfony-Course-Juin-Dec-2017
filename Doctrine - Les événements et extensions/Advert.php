<?php
// src/OC/PlatformBundle/Entity/Advert.php

namespace OC\PlatformBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 *@ORM\Table(name="oc_advert")
 *@ORM\Entity(repositoryClass="OC/PlatformBundle/Repository/AdvertRepository")
 *@ORM\HasLifecycleCallbacks()
 */
class Advert {
	/**
	 * @ORM\Column(name="published_at", type="datetime", nullable=true)
	 */
	private $publishedAt;
	
	//...
	
	/**
	 * @ORM\PreUpdate
	 */
	public function updateDate() {
		$this->setPublishedAt(new \DateTime());
	}
	
	//...
}