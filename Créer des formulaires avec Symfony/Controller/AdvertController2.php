<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

/* eclipse
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
		$form = $ths->get('form.factory')
					->createBuilder(FormType::class, $advert)
					->add('date',		DateType::class)
				    ->add('title',		TextType::class)
				    ->add('content',	TextareaType::class)
				    ->add('author',		TextType::class)
				    ->add('published',	CheckboxType::class)
				    ->add('save',		SubmitType::class)
				    ->getForm();
		
		if($request->isMethod('POST')) {
			// On fait le lien Requête <->Formulaire
			$form->handleRequest($request); // $advert contient maintenant les valeurs entrées dans le formulaire par le visiteur
			
			if($form->isValid()) {
				// les données sont donc valides
				
				$em = $this->getDoctrine()->getManager();
				$em->persist($advert);
				$em->flush();
				
				$request->getSession()->getFlashBag()->add('Notice', 'Annonce bien enregisrée');
				
				return $this->redirectToRoute('oc_platform_view', array('id' => $advert->getId()));
			}
			
			
		}
		
		// On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
		return $this->render('OCPlatformBundle:Advert:add.html.twig', array('form' => $form->createView()));
	}
}