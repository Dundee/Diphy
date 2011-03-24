<?php

namespace Diphy;

use Diphy\Builder\IBuilder;
use ClassReflection;

/**
 * Basic Dependency Injection container
 */
class Container
{
	private $config = array(
	);

	/** var mixed[] */
	private $services;

	public function __construct(array $config = array())
	{
		$this->config = $config + $this->config;
	}

	/**
	 * Returns service
	 * @param string $serviceName
	 * @return mixed
	 */
	public function getService($serviceName)
	{
		if (isset($this->services[$serviceName])) {
			return $this->services[$serviceName];
		} else {
			throw new \InvalidArgumentException(sprintf('Service "%s" is not set', $serviceName));
		}
	}

	/**
	 * Sets service
	 * @param string $serviceName
	 * @param mixed $service
	 * @return Diphy\Container
	 */
	public function setService($serviceName, $service)
	{
		$this->services[$serviceName] = $service;
		return $this;
	}
}
