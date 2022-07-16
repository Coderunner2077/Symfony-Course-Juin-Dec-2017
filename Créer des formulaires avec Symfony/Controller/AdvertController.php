<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use OC\PlatformBundle\Entity\Advert;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AdvertController extends Controller {
	public function addAction(Request $request) {
		$advert = new Advert();
		
		// On crée le FormBuilder grâce au service form factory
		$formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $advert);
		
		// On ajoute les champs de l'entité que l'on veut à notre formulaire
		$formBuilder->add('date',		DateType::class)
				    ->add('title',		TextType::class)
				    ->add('content',	TextareaType::class)
				    ->add('author',		TextType::class)
				    ->add('published',	CheckboxType::class)
				    ->add('save',		SubmitType::class);
		
		// Pour l'instant, pas de candidatures, catégories, etc., on les gérera plus tard
		
		// A partir du formBuilder, on génère le formulaire
		$form = $formBuilder->getForm();
		
		// On passela méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
		return $this->render('OCPlatformBundle:Advert:add.html.twig', array('form' => $form->createView()));
	}
}