<?php
class Container {
	
	protected $service1 = null;
	protected $service2 = null;
	
	public function getService1() {
		if($this->service1 !== null)
			return $this->service1;
		$service2 = $this->getService2();
		$this->service1 = new Service1($service2);
		
		return $this->service1;
	}
	
	public function getService2() {
		if($this->service2 !== null)
			return $this->service2;
		
		$this->service2 = new Service2();
		
		return $this->service2;
	}
}