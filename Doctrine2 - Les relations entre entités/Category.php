<?php
// src/OC/PlatformBundle/Entity/Category.php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Category {
	/**
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $_id;
	
	/**
	 * @ORM\Column(name="name", type="string", length=255)
	 */
	private $_name;
	
	public function getId() { return $this->_id; }
	
	public function setName($name) { $this->_name = $name; }
	
	public function getName() { return $this->_name; }
}