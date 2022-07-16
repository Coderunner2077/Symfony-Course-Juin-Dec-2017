<?php
interface AuthenticationFailureEvent { // attention, je l'ai déclaré comme une interface, mais c'est une classe normalement...
	public function getAuthenticationException();
	public function getRequest();
	public function isPropagationStopped();
	public function stopPropagation();
}