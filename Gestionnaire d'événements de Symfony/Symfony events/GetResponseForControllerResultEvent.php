<?php
interface GetResponseForControllerResultEvent { // attention, je l'ai déclaré comme une interface, mais c'est une classe normalement...
	public function getControllerResult();
	public function getResponse();
	public function setResponse(Response $response);
	public function hasResponse();
	public function getKernel();
	public function getRequest();
	public function getRequestType();
	public function isMasterRequest();
	public function isPropagationStopped();
	public function stopPropagation();
}