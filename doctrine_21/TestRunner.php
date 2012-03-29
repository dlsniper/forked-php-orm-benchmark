<?php

require dirname(__FILE__) . '/Doctrine21TestSuite.php';

$time = microtime(true);
$memory = memory_get_usage();
$test = new Doctrine21TestSuite();
$test->initialize();
$test->run();
echo "memory=".(memory_get_usage() - $memory)." bytes\t time=".(microtime(true) - $time)." seconds\n";
/*

require dirname(__FILE__) . '/Doctrine2WithCacheTestSuite.php';

$test = new Doctrine2WithCacheTestSuite();
$test->initialize();
$test->run();

// Optional tests of the alternative abstraction levels of results doctrine provides.
// These are often used in production when data is only needed for presentation (read-only) purposes.
require dirname(__FILE__) . '/Doctrine2ArrayHydrateTestSuite.php';

$test = new Doctrine2ArrayHydrateTestSuite();
$test->initialize();
$test->run();

require dirname(__FILE__) . '/Doctrine2ScalarHydrateTestSuite.php';

$test = new Doctrine2ScalarHydrateTestSuite();
$test->initialize();
$test->run();

require dirname(__FILE__) . '/Doctrine2WithoutProxiesTestSuite.php';

$test = new Doctrine2WithoutProxiesTestSuite();
$test->initialize();
$test->run();
*/
