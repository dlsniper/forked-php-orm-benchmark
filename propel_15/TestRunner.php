<?php

require dirname(__FILE__) . '/Propel15aLa14TestSuite.php';

$time = microtime(true);
$memory = memory_get_usage();
$test = new Propel15aLa14TestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";

require dirname(__FILE__) . '/Propel15TestSuite.php';

$time = microtime(true);
$memory = memory_get_usage();
$test = new Propel15TestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
