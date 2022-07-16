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
	
	/**
	 * @ORM\ManyToMany(targetEntity="OC\PlatformBundle\Entity\Category", cascade={"persist"})
	 * @ORM\JoinTable(name="oc_advert_category")
	 */
	private $_categories;
	
	public function __construct() {
		$this->_date = new \DateTime();
		$this->_categories = new ArrayCollection();
	}
	// On ajoute une seule catégorie à la fois
	public function addCategory(Category $category) {
		// On utilise ArrayCollection vraiment comme un tableau
		$this->_categories[] = $category;
	}
	
	public function removeCategory(Category $category) {
		$this->_categories->removeElement($category);
	}
	
	public function getCategories() { 
		return $this->_categories;
	}
}