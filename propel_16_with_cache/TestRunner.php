<?php

require dirname(__FILE__) . '/Propel16WithCacheTestSuite.php';

$test = new Propel16WithCacheTestSuite();
$test->initialize();
$test->run();
