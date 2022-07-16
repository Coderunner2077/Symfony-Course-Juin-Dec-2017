<?php
// src/OC/PlatformBundle/Validator/AntifloodValidator

namespace OC\PlatformBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class AntifloodValidator extends ConstraintValidator {
	public function validate($value, Constraint $constraint) {
		// Pour l'instant, on cosidère comme flood tout message de moins de 3 caractères.
		if(strlen($value) < 3) {
			// C'est cette ligne qui déclenche l'eurreur pour le formulaire avec en arugument le message de la contrainte
			$this->context->addViolation($constraint->message);
		}
	}
}