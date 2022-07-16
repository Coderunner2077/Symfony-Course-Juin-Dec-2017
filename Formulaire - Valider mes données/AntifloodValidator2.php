<?php
// src/OC/PlatformBundle/Validator/AntifloodValidator

namespace OC\PlatformBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class AntifloodValidator extends ConstraintValidator {
	private $requestStack;
	private $em;
	
	public function __construct(RequestStack $requestStack, EntityManagerInterface $em) {
		$this->requestStack = $requestStack;
		$this->em = $em;
	}
	
	public function validate($value, Constraint $constraint) {
		// Pour récupérer l'objet Request tel qu'on le connaît, il faut utiliser getCurrentRequest du service request_stack
		$request = $this->requestStack->getCurrentRequest();
		
		// On récupère l'IP de celui qui poste
		$ip = $request->getClientIp();
		
		// On vérifie si cette IP a déjà posté une candidature il y a moins de 15 secondes
		$isFlood = $this->em
					->getRepository('OCPlatformBundle:Application')
					->isFlood($ip, 15);		// Bien entendu, on suppose que cette méthode isFlood est déjà créée (ou va l'être) dans le repository
		
		if($isFlood) {
			// C'est cette ligne qui déclenche l'erreur pour le formulaire, avec en argument le message
			$this->context->addViolation($constraint->message);
		}
	}
}