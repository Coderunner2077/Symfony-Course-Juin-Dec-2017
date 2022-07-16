<?php
// src/OC/PlatformeBudle/Entity/Advert.php

namespace OC\PlatformBudle\Entity;

//On définit le namespace des annotations utilisées par Doctrine2
// En effet, il existe d'autres annotations, on le verra par la suite,
// qui utiliseront un autre namespace

use Doctrine\ORM\Mapping as ORM;

/**
 * Advert
 * 
 * 
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="OC\PlatformBundle\Entity\AdvertRepository")
 */
class Advert {
	/**
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(name="title", type="string", length=255)
	 */
	protected $title;
	
	/**
	 * @ORM\Column(name="author", type="string", length=255)
	 */
	protected $author;
	
	/**
	 * @ORM\Column(name="content", type="text")
	 */
	protected $content;
	
	public function __construct() {
		$this->date = new \DateTime();
	}
	
	// Les getters
	// Les setters
}