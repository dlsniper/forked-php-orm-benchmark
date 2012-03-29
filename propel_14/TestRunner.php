<?php

require dirname(__FILE__) . '/Propel14TestSuite.php';

$time = microtime(true);
$memory = memory_get_usage();
$test = new Propel14TestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
