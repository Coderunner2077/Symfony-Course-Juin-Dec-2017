<?php
// src/OC/PlatformBundle/Form/AdvertType.php

namespace OC\PlatformBundle\Form;

use Symfony\Component\Form\AbstractForm;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; // !attention

class AdvertType extends AbstractType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('date', 		DateTimeType::class)
				->add('title',		TextType::class)
				->add('author',		TextType::class)
				->add('content',	TextareaType::class)
				->add('published',	CheckboxType::class)
				->add('image',		ImageType::class) // j'ajoute cette ligne
		
				->add('categories', EntityType::class, array(
						'class' 		=> 'OCPlatformBundle:Category',
						'choice_label' 	=> 'name',
						'multiple'		=> true
				))
				->add('save',		SubmitType::class);
	}
	
	public function configureOptions(OptionsResolver $options) {
		$resolver->setDefaults(array(
				'data_class' => 'OC\PlatformBundle\Entity\Advert'
		));
	}
}