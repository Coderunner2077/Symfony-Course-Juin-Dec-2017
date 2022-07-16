<?php
// Depuis un contrôleur : illustration de la manipulation directe du gestionnaire d'événements

class InSomeController {
	public function someAction() {
		// ... 
		
		// On instancie notre listener
		$betaListener = new BetaListener('2017-12-31');
		
		// On récupère le gestionnaire d'événements, qui heureusement est un service !
		
		$dispatcher = $this->get('event_dispatcher');
		
		// On dit au gestionnaire d'événements d'exécuter la méthode onKernelResponse de notre listener
		// lorsque l'évènement kernel.response est déclenché
		$dispatcher->addListener(
				'kernel.response',
				array($betaListener, 'processData')
		);
	}
}

