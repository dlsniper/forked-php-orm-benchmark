<?php

require_once dirname(__FILE__) . '/../propel_14/Propel14TestSuite.php';

class Propel15aLa14TestSuite extends Propel14TestSuite
{
	function initialize()
	{
		set_include_path(
			realpath(dirname(__FILE__) . '/build/classes') . PATH_SEPARATOR .
			realpath(dirname(__FILE__) . '/vendor/propel/runtime/lib') . PATH_SEPARATOR .
			get_include_path()
		);

		require_once 'Propel.php';
		$conf = include realpath(dirname(__FILE__) . '/build/conf/bookstore-conf.php');
		$conf['log'] = null;
		Propel::setConfiguration($conf);
		Propel::initialize();
		Propel::disableInstancePooling();
		
		$this->con = Propel::getConnection('bookstore');
		$this->initTables();
	}
}