<?php
// src/OC/PlatformBundle/Antispam/OCAntispam.php

namespace OC\PlatformBundle\Antispam;

class OCAntispam {
	
	/**
	 * Vérifie si le texte est un spam ou non
	 * 
	 * @param string $text
	 * @return boolean
	 */
	/*
	public function isSpam($text) {
		return strlen($text) < 50;
	}
	*/
	protected $mailer,
			  $locale,
			  $minLength;
	
	public function __construct(\SwiftMailer $mailer, $locale, $minLength) {
		$this->mailer = $mailer;
		$this->locale = $locale;
		$this->minLength = (int) $minLength;
	}
	
	/**
	 * Vérifie si le texte est un spam ou non
	 *
	 * @param string $text
	 * @return boolean
	 */
	public function isSpam($text) {
		return strlen($text) < $this->minLength;
	}
}