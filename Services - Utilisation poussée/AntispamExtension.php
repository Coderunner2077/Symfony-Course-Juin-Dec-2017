<?php
// src/OC/PlatformBundle/Twig/AntispamExtension.php

namespace OC\PlatformBundle\Twig;

class AntispamExtension {
	/**
	 * @var OCAntispam
	 */
	private $ocAntispam;
	
	public function __construct(OCAntispam $ocAntispam) {
		$this->ocAntispam = $ocAntispam;
	}
	
	public function checkIfArgumentIsSpam($text) {
		return $this->ocAntispam->isSpam($text);
	}
}