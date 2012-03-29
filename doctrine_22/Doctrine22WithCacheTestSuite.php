<?php

require_once dirname(__FILE__) . '/Doctrine22TestSuite.php';

class Doctrine22WithCacheTestSuite extends Doctrine22TestSuite
{
    private $cache = null;
    
	function initialize()
	{
		parent::initialize();
		$this->cache = new Doctrine\Common\Cache\ArrayCache();
		$this->em->getConfiguration()->setMetadataCacheImpl($this->cache);
        $this->em->getConfiguration()->setQueryCacheImpl($this->cache);
	}
	
}