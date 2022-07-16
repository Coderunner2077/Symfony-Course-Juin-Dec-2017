<?php
// src/OC/PlatformBundle/Entity/Advert.php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
// Attention à ne pas oublier ce use
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 */
class Advert {
	// ...
	
	/**
	 * Gedmo\Slug(fields={"title"})
	 * @ORM\Column(name="slug", type="string", length=255, unique=true)
	 */
	private $slug;
	
	// ...
}