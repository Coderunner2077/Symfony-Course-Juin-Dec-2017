<?php
interface FilterControllerEvent { // attention, je l'ai déclaré comme une interface, mais c'est une classe normalement...
	public function getController();
	public function setController(Controller $controller);
	public function getKernel();
	public function getRequest();
	public function getRequestType();
	public function isMasterRequest();
	public function isPropagationStopped();
	public function stopPropagation();
}