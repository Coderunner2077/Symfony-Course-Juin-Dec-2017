<?php
interface GetResponseEvent {	// attention, je l'ai déclaré comme une interface, mais c'est une classe normalement...
	public function getResponse();
	public function setResponse(Response $response);
	public function hasResponse();
	public function getKernel();
	public function getRequest();
	public function getResquestType();
	public function isMasterRequest();
	public function isPropagationStopped();
	public function stopPropagation();
}