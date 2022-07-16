<?php
// src/OC/PlatformBundle/Form/AdvertType.php

namespace OC\PlatformBundle\Form;

class AdvertType extends AbsractType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder 
		// ...
			->add('content', 	CkeditorType::class);
	}
	
	// ...
}