<?php

require dirname(__FILE__) . '/Doctrine12TestSuite.php';

$test = new Doctrine12TestSuite();
$test->initialize();
$test->run();

require dirname(__FILE__) . '/Doctrine12WithCacheTestSuite.php';

$test = new Doctrine12WithCacheTestSuite();
$test->initialize();
$test->run();
