<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo; // à ne pas oublier (cf doctrine extensions)
use Symfony\Component\Validator\Constraints as Assert; // !important pour définir le namespace pour les annotations de validation
use Symfony\Component\Validator\Context\ExecutionContextInterface;  // !important

/**
 * Advert
 *
 * @ORM\Table(name="oc_advert")
 * @ORM\Entity(repositoryClass="OC\PlatformBundle\Repository\AdvertRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Advert
{
	//... 
	private $content;
	
	/**
	 * @Assert\Callback
	 */
	public function isContentValid(ExecutionContextInterface $context){
		$forbiddenWords = array('démotivation', 'abandon');
		
		// On vérifie que le contenu ne contient pas l'un des mots
		if(preg_match('#'.implode('|', $forbiddenWords). '#i', $this->content)) {
			// La règle est violée, on définit l'erreur :
			$context 
				->buildViolation('Contenu invalide car il contient un mot interdit.')  // message
				->atPath('content')		// attribut de l'objet qui est violé
				->addViolation();		// Ceci déclenche l'erreur (à ne pas oublier !)
		}
	}
}
