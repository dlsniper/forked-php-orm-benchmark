<?php

require dirname(__FILE__) . '/Doctrine21TestSuite.php';
$time = microtime(true);
$memory = memory_get_usage();
$test = new Doctrine21TestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
unset($test);

require dirname(__FILE__) . '/Doctrine21WithCacheTestSuite.php';
$time = microtime(true);
$memory = memory_get_usage();
$test = new Doctrine21WithCacheTestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
unset($test);

// Optional tests of the alternative abstraction levels of results doctrine provides.
// These are often used in production when data is only needed for presentation (read-only) purposes.

require dirname(__FILE__) . '/Doctrine21ArrayHydrateTestSuite.php';
$time = microtime(true);
$memory = memory_get_usage();
$test = new Doctrine21ArrayHydrateTestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
unset($test);

require dirname(__FILE__) . '/Doctrine21ScalarHydrateTestSuite.php';
$time = microtime(true);
$memory = memory_get_usage();
$test = new Doctrine21ScalarHydrateTestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
unset($test);

require dirname(__FILE__) . '/Doctrine21WithoutProxiesTestSuite.php';
$time = microtime(true);
$memory = memory_get_usage();
$test = new Doctrine21WithoutProxiesTestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
unset($test);
