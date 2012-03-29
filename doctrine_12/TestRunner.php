<?php

require dirname(__FILE__) . '/Doctrine12TestSuite.php';

$time = microtime(true);
$memory = memory_get_usage();
$test = new Doctrine12TestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";

require dirname(__FILE__) . '/Doctrine12WithCacheTestSuite.php';

$time = microtime(true);
$memory = memory_get_usage();
$test = new Doctrine12WithCacheTestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
