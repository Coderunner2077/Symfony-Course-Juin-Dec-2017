<?php
// Symfony/Component/HttpKernel/Event/FilterResponseEvent.php

interface FilterResponseEvent { // attention, je l'ai déclaré comme une interface, mais c'est une classe normalement...
	public function getResponse();
	public function setResponse(Response $response);
	public function getKernel();
	public function getRequest();
	public function getRequestType();
	public function isPropagationStopped();
	public function stopPropagation();
}