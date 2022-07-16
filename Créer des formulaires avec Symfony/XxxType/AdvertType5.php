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
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use OC\PlatformBundle\Repository\CategoryRepository;
// !important
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class AdvertType extends AbstractType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		// Arbitrairement, on récupère toutes les catégories qui commencent par "D"
		$pattern = 'D%';
		$builder->add('date', 		DateTimeType::class)
				->add('title',		TextType::class)
				->add('author',		TextType::class)
				->add('content',	TextareaType::class)
				// ->add('published',	CheckboxType::class) je supprime ce champ d'ici
				->add('image',		ImageType::class) // j'ajoute cette ligne 
		
				->add('categories', EntityType::class, array(
						'class' 		=> 'OCPlatformBundle:Category',
						'choice_label' 	=> 'name',
						'multiple'		=> true,
						'query_builder' => function(CategoryRepository $repository) use($pattern) {
							return $repository->getLikeQueryBuilder($pattern);
						}
				))
				->add('save',		SubmitType::class);
				
		// J'ajoute une fonction qui va écouter un événement
		$builder->addEventListener(
			FormEvents::PRE_SET_DATA,		// 1er argument: L'événement qui m'intéresse ici, PRE_SET_DATA
			function(FormEvent $event) {	// 2e argument: La fonction à exécuter lorsque l'évènement est déclenché
				// On récupère notre objet Advert sous-jacent
				$advert = $event->getData();
				
				// Cette condition est importante, on en reparle plus loin
				if($advert === null)
					return; // On sort de la fonction sans rien faire lorsque $advert vaut null
				
				//Si l'annonce n'est pas publiée, ou elle n'existe pas encore en base (id est null)
				if(!$advert->getPublished() || null === $advert->getId()) {
					// Alors on ajoute le champ published
					$event->getForm()->add('published', CheckboxType::class, array('required' => false));
				} else {
					// Sinon, on le supprime
					$event->getForm()->remove('published');
				}
				
			}
		);
	}
	
	public function configureOptions(OptionsResolver $options) {
		$resolver->setDefaults(array(
				'data_class' => 'OC\PlatformBundle\Entity\Advert'
		));
	}
}