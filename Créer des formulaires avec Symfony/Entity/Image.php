<?php
// src/OC/PlatformBundle/Entity/Image

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
// !important
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="OC\PlatformBundle\Entity\ImageRepository")
 */
class Image {
	/**
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @ORM\Column(name="url", type="string", length=255)
	 */
	private $url;
	
	/**
	 * @ORM\Column(name="alt", type="string", length=255)
	 */
	private $alt;
	
	private $file;
	
	public function setFile(UploadedFile $file = null) {
		$this->file = $file;
	}
	
	public function getFile() {
		return $this->file;
	}
	
	public function upload() {
		// Si jamais il n'y a pas de fichier (champ facultatif), on ne fait rien
		if(null === $this->file)
			return;
		
		// On récupère le nom original du fichier de l'internaute
		$name = $this->file->getClientOriginalName();
		
		// On déplace le fichier envoyé dans le répertoire de notre choix
		$this->file->move($this->getUploadRootDir(), $name);
		
		//On sauvegarde le nom du fichier dans notre attribut $url
		$this->url = $name;
		
		// On crée également le futur attribut alt de notre balise <img>
		$this->alt = $name;
	}
	
	public function getUploadDir() {
		// On retourne le chemin relatif vers l'image pour un navigateur (relatif au répertoire /web donc)
		return 'uploads/img';
	}
	
	public function getUploadRootDir() {
		// On retourne le chemin relatif vers l'image pour notre code PHP
		return __DIR__.'/../../../../web/'.$this->getUploadDir();
	}
}