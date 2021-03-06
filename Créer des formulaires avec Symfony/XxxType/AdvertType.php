<?php
// src/OC/PlatformBundle/Form/AdvertType.php

namespace OC\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdvertType extends AbstractType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('date', 		DateTimeType::class)
				->add('title',		TextType::class)
				->add('author',		TextType::class)
				->add('content',	TextareaType::class)
				->add('published',	CheckboxType::class)
				->add('image',		ImageType::class) // j'ajoute cette ligne
				->add('save',		SubmitType::class);
	}
	
	public function configureOptions(OptionsResolver $options) {
		$resolver->setDefaults(array(
				'data_class' => 'OC\PlatformBundle\Entity\Advert'
		));
	}
}