<?php

require dirname(__FILE__) . '/Doctrine22TestSuite.php';
$time = microtime(true);
$memory = memory_get_usage();
$test = new Doctrine22TestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
unset($test);

require dirname(__FILE__) . '/Doctrine22WithCacheTestSuite.php';
$time = microtime(true);
$memory = memory_get_usage();
$test = new Doctrine22WithCacheTestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
unset($test);

// Optional tests of the alternative abstraction levels of results doctrine provides.
// These are often used in production when data is only needed for presentation (read-only) purposes.

require dirname(__FILE__) . '/Doctrine22ArrayHydrateTestSuite.php';
$time = microtime(true);
$memory = memory_get_usage();
$test = new Doctrine22ArrayHydrateTestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
unset($test);

require dirname(__FILE__) . '/Doctrine22ScalarHydrateTestSuite.php';
$time = microtime(true);
$memory = memory_get_usage();
$test = new Doctrine22ScalarHydrateTestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
unset($test);

require dirname(__FILE__) . '/Doctrine22WithoutProxiesTestSuite.php';
$time = microtime(true);
$memory = memory_get_usage();
$test = new Doctrine22WithoutProxiesTestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
unset($test);
