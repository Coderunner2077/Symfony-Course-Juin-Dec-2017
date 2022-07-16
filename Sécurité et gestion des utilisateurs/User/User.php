<?php
// src/OC/UserBundle/Entity/User;

namespace OC\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="oc_user")
 * @ORM\Entity(repositoryClass="OC\UserBundle\Entity\UserRepository")
 */
class User implements UserInterface {
	/**
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @ORM\Column(name="username", type="string", length=255, unique=true)
	 */
	private $username;
	
	/**
	 * @ORM\Column(name="password", type="string", length=255)
	 */
	private $password;
	
	/**
	 * @ORM\Column(name="salt", type="string", length=255)
	 */
	private $salt;
	
	/**
	 * @ORM\Column(name="roles", type="array")
	 */
	private $roles = array();
	
	// getters et setters
	
	public function eraseCredentials() {
		
	}
}