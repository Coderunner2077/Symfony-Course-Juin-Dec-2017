<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo; // à ne pas oublier (cf doctrine extensions)
use Symfony\Component\Validator\Constraints as Assert; // !important pour définir le namespace pour les annotations de validation
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity; // !important pour utiliser la contrainte UniqueEntity

/**
 * Advert
 *
 * @ORM\Table(name="oc_advert")
 * @ORM\Entity(repositoryClass="OC\PlatformBundle\Repository\AdvertRepository")
 * @UniqueEntity(fields="title", message="Une annonce existe déjà avec ce titre")
 */
class Advert
{
	/**
	 * @var string
	 * 
	 * Et pour être cohérent, il faudrait aussi mettre la colonne titre en Unique pour Doctrine
	 * @ORM\Column(name="title", type="string", length=255, unique=true)
	 */
	private $title;
	
	// ...
}
