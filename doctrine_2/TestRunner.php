<?php

require dirname(__FILE__) . '/Doctrine2TestSuite.php';
$time = microtime(true);
$memory = memory_get_usage();
$test = new Doctrine2TestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
unset($test);

require dirname(__FILE__) . '/Doctrine2WithCacheTestSuite.php';
$time = microtime(true);
$memory = memory_get_usage();
$test = new Doctrine2WithCacheTestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
unset($test);

// Optional tests of the alternative abstraction levels of results doctrine provides.
// These are often used in production when data is only needed for presentation (read-only) purposes.

require dirname(__FILE__) . '/Doctrine2ArrayHydrateTestSuite.php';
$time = microtime(true);
$memory = memory_get_usage();
$test = new Doctrine2ArrayHydrateTestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
unset($test);

require dirname(__FILE__) . '/Doctrine2ScalarHydrateTestSuite.php';
$time = microtime(true);
$memory = memory_get_usage();
$test = new Doctrine2ScalarHydrateTestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
unset($test);

require dirname(__FILE__) . '/Doctrine2WithoutProxiesTestSuite.php';
$time = microtime(true);
$memory = memory_get_usage();
$test = new Doctrine2WithoutProxiesTestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
unset($test);
