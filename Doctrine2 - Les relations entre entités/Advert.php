<?php
// src/OC/PlatformBundle/Entity/Advert.php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="oc_advert")
 * @ORM\Entity(repositoryClass="OC\PlatformBundle\Entity\")
 */
class Advert {
	//...
	/**
	 * @ORM\OneToOne(targetEntity="OC\PlatformBundle\Entity\Image", cascade={"persist"})
	 */
	private $_image;
	
	//...
}