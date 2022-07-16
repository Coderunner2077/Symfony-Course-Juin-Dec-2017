<?php
// src/OC/UserBundle/DataFixtures/ORM/LoadUser.php

namespace OC\UserBundle\DataFixturesInterface;

use Doctrine\Common\DataFixtures\FixturesInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\UserBundle\Entity\User;

class LoadUser implements FixtureInterface {
	public function load(ObjectManager $manager) {
		$listNames = array('Alexandre', 'Jean', 'Juilien');
		
		foreach($listNames as $name) {
			$user = new User();
			
			// Le nom d'utilisatur et le mot de passe sont identiques pour l'instant
			$user->setUsername($name);
			$user->setPassword($name);
			
			// On se sert pas de sel pour l'instant
			$user->setSalt('');
			// On définit uniquement le rôle ROLE_USER qui est le rôle de base
			$user->setRoles(array('ROLE_USER'));
			
			$manager->persist($user);
		}
		
		$manager->flush();
	}
}