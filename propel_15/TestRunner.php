<?php

require dirname(__FILE__) . '/Propel15aLa14TestSuite.php';

$test = new Propel15aLa14TestSuite();
$test->initialize();
$test->run();

require dirname(__FILE__) . '/Propel15TestSuite.php';

$test = new Propel15TestSuite();
$test->initialize();
$test->run();
