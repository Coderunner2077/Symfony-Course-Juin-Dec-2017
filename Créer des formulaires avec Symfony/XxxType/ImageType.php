<?php
// src/OC/PlatformBundle/Form/ImageType.php

namespace OC\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfont\Component\OptionsResolver\OptionsResolver;

class ImageType extends AbstractType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('url',	TextType::class)
				->add('alt',	TextType::class);
	}
	
	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setDefaults(array(
				'date_class' => 'OC\PlatformBundle\Entity\Image'
		));
	}
}