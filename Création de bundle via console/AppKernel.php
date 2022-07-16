<?php
// app/AppKernel.php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel {
	public function registerBundles() {
		$bundles = array(
				new Symfony\Bundle\FramworkBundle\FrameworkBundle(),
				new Symfony\Bundle\SecurityBundle\SecurityBundle(),
				new Symfony\Bundle\TwigBundle\TwigBundle(),
				new Symfony\Bundle\MonologBundle\MonologBundle(),
				new Symfony\Bundle\SwiftMailerBundle\SwiftMailerBundle(),
				new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
				new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
				new AppBundle\AppBundle(),
				// Le g�n�rateur a g�n�r� la ligne suivante :
				new OC\PlatformBundle\OCPlatformBundle()		
		);
		
		if(in_array($this->getEnvironment(), array('dev', 'test'), true)) {
			$bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
			$bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
			$bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
			$bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
		}
		
		return $bundles;
	}
	
	// ...
}