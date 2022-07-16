<?php
// src/OC/PlatformBundle/Beta/BetaListener.php

namespace OC\PlatformBundle\Beta;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class BetaListener {
	protected $htmlAdder;
	protected $endDate;
	
	public function __construct(BetaHTMLAdder $htmlAdder, $endDate) {
		$this->htmlAdder = $htmlAdder;
		$this->endDate = new \DateTime($endDate);
	}
	
	public function processBeta(FilterResponseEvent $event) {
		$remainingDays = $this->endDate->diff(new \DateTime())->days;
		
		if($remainingDays <= 0)
			return;
		
		if(!$event->isMasterRequest())
			return;
		
		$response = $this->htmlAdder->addBeta($event->getResponse(), $remainingDays);
		
		$event->setResponse($response);		
	}
}