<?php
// src/OC/PlatformBundle/Entity/Advert.php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Advert
 * 
 * 
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="OC\PlatformBundle\Entity\AdvertRepository")
 */
class Advert {
	
	//... les autres attributs
	
	/**
	 * @ORM\Column(name="published", type="boolean")
	 */
	private $published = true;
	
	//...
}
