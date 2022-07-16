<?php
// src/OC/PlatformBundle/Entity/AdvertSkill.php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="oc_advert_skill")
 */
class AdvertSkill {
	/**
	 * @ORM\Table(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $_id;
	
	/**
	 * @ORM\Column(name="level", type="string", length=255)
	 */
	private $_level;
	
	/**
	 * @ORM\ManyToOne(targetEntity="OC\PlatformBundle\Entity\Advert")
	 * @ORM\JoinColumn(name="advert_id", nullable=false)
	 */
	private $_advert;
	
	/**
	 * @ORM\ManyToOne(targetEntity="OC\PlatformBundle\Entity\Skill", cascade={"persist"})
	 * @ORM\JoinColumn(name="skill_id", nullable=false)
	 */
	private $_skill;
	
	// je peux aussi ajouter d'autres attributs
	public function getId()
	{
		return $this->_id;
	}
	
	public function setLevel($level)
	{
		$this->_level = $level;
	}
	
	public function getLevel()
	{
		return $this->_level;
	}
	
	public function setAdvert(Advert $advert)
	{
		$this->_advert = $advert;
	}
	
	public function getAdvert()
	{
		return $this->_advert;
	}
	
	public function setSkill(Skill $skill)
	{
		$this->_skill = $skill;
	}
	
	public function getSkill()
	{
		return $this->_skill;
	}
}