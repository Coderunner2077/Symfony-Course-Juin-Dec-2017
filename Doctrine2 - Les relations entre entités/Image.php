<?php
// src/OC/PlatformBundle/Entity/Image

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *@ORM\Table(name="oc_image")
 *@ORM\Entity(repositoryClass="OC\PlatformBundle\Entity\EntityRepository")
 */
class Image {
	/**
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $_id;
	
	/**
	 * @ORM\Column(name="url", type="string", length=255)
	 */
	private $_url;
	
	/**
	 * @ORM\Column(name="alt", type="string", length=255)
	 */
	private $_alt;	
}

