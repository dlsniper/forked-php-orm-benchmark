<?php

require dirname(__FILE__) . '/Propel15WithCacheTestSuite.php';

$test = new Propel15WithCacheTestSuite();
$test->initialize();
$test->run();
