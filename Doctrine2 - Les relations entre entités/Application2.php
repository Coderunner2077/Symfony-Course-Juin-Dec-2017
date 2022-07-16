<?php
// src/OC/PlatformBundle/Entity/Application.php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="oc_application")
 * @ORM\Entity(repositoryClass="OC\PlatformBundle\Entity\ApplicationRepository")
 */
class Application {
	/**
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $_id;
	
	/**
	 * @ORM\Column(name="author", type="string", length=255)
	 */
	private $_author;
	
	/**
	 * @ORM\Column(name="content", type="text")
	 */
	private $_content;
	
	/**
	 * @ORM\Column(name="date", type="date")
	 */
	private $_date;
	
	/**
	 * @ORM\ManyToOne(target="OC\PlatformBundle\Entity\Advert", inversedBy="_applications")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $_advert;
	
	public function __construct() {
		$this->_date = new \DateTime();
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setAuthor($author)
	{
		$this->author = $author;
		
		return $this;
	}
	
	public function getAuthor()
	{
		return $this->author;
	}
	
	public function setContent($content)
	{
		$this->content = $content;
		
		return $this;
	}
	
	public function getContent()
	{
		return $this->content;
	}
	
	public function setDate(\Datetime $date)
	{
		$this->date = $date;
		
		return $this;
	}
	
	public function getDate()
	{
		return $this->date;
	}
	
	public function setAdvert(Advert $advert) {
		$this->_advert = $advert;
		
		return $this;
	}
	
	public function getAdvert() {
		return $this->_advert;
	}
}