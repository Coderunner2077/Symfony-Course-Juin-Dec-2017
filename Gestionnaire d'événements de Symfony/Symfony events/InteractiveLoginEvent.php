<?php
interface InteractiveLoginEvent { // attention, je l'ai déclaré comme une interface, mais c'est une classe normalement...
	public function getAuthenticationToken();
	public function getRequest();
	public function isPropagationStopped();
	public function stopPropagation();
}