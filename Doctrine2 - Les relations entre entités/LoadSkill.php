<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadSkill.php

namespace OC\PlatformBundle\DataFixures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\PlatformBundle\Entity\Skill;

class LoadSkill extends FixtureInterface {
	public function load(ObjectManager $manager) {
		$names = ['PHP', 'Symfony', 'C++', 'Java', 'Photoshop', 'Blender', 'Bloc-note'];
		
		foreach($names as $name) {
			// On crée la compétence
			$skill = new Skill();
			$skill->setName($name);
			
			// On la persiste
			$manager->persist($skill);
		}
		
		// On déclenche l'enregistrement de toutes les catégories
		$manager->flush();
	}
}