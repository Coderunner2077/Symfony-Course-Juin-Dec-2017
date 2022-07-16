<?php
// src/OC/PlatformBundle/Beta/BetaListener.php

namespace OC\PlatformBundle\Beta;

use Symfony\Component\HttpFoundation\Response;

class BetaListener {
	protected $betaAdder;
	
	// La date de fin de la version bêta:
	// - Avant cette date, on affichera la bannière, mais pas après
	protected $endDate;
	
	public function __construct(BetaHTMLAdder $betaAdder, $endDate) {
		$this->betaAdder = $betaAdder;
		$this->endDate = new \DateTime($endDate);
	}
	
	public function processBeta() {
		$remainingDays = $this->endDate->diff(new \DateTime())->days;
		
		if($remaininsDays <= 0)
			return; 	// Si la date est dépassée, on ne fait rien
		
		// Ici, on appelera la méthode $this->betaAdder->addBeta()
		
	}
}