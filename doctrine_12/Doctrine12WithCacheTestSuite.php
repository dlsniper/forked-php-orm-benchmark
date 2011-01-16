<?php

require_once dirname(__FILE__) . '/Doctrine12TestSuite.php';

class Doctrine12WithCacheTestSuite extends Doctrine12TestSuite
{
	protected $cache;
	
	function initialize()
	{
		parent::initialize();
		$this->cache = new Doctrine_Cache_Array();
		$this->manager->setAttribute(Doctrine_Core::ATTR_QUERY_CACHE, $this->cache);
	}
	
	function clearCache()
	{
		parent::clearCache();
		if ($this->cache->count() > 0) {
			$this->cache->deleteAll();
		}
		
	}
	
}