<?php
// src/OC/PlatformBundle/Form/CkeditorType.php

namespace OC\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OpionsResolver\OptionsResolver;

class CkeditorType extends AbstractType {
	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setDefaults(array(
				'attr' => array('class' => 'ckeditor')	// on ajoute la classe ckeditor
		));
	}
	
	public function getParent() {	// On utilise l'héritage de formulaire
		return TextareaType::class;
	}
}