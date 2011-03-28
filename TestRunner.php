<?php

echo "                               | Insert | findPk | complex| hydrate|  with  |\n";
echo "                               |--------|--------|--------|--------|--------|\n";

passthru('php raw_pdo/TestRunner.php');
passthru('php propel_14/TestRunner.php');
passthru('php propel_15/TestRunner.php');
passthru('php propel_15_with_cache/TestRunner.php');
passthru('php propel_16/TestRunner.php');
passthru('php doctrine_12/TestRunner.php');
passthru('php doctrine_2/TestRunner.php');
