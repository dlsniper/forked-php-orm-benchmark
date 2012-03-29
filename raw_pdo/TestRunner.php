<?php

require dirname(__FILE__) . '/PDOTestSuite.php';

$time = microtime(true);
$memory = memory_get_usage();
$test = new PDOTestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
