<?php

require_once dirname(__FILE__) . '/Doctrine21TestSuite.php';

class Doctrine21WithCacheTestSuite extends Doctrine21TestSuite
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