<?php
// src/OC/PlatformBundle/Entity/Advert.php

namespace OC\PlatformBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 *@ORM\Table(name="oc_advert")
 *@ORM\Entity(repositoryClass="OC/PlatformBundle/Repository/AdvertRepository")
 */
class Advert {
	/**
	 * @ORM\Column(name="nb_applications", type="integer")
	 */
	private $nbApplications;
	
	public function incrementApplication() {
		$this->nbApplications++;
	}
	
	public function decrementApplication() {
		$this->nbApplications--;
	}
	
	//...
}