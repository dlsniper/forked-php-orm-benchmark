<?php

require_once(dirname(__FILE__) . '/vendor/doctrine/Doctrine.php');
spl_autoload_register(array('Doctrine', 'autoload'));
$manager = Doctrine_Manager::getInstance();

$config = array('data_fixtures_path'  =>  dirname(__FILE__) . '/fixtures',
                'models_path'         =>  dirname(__FILE__) . '/models',
                'migrations_path'     =>  dirname(__FILE__) . '/migrations',
                'sql_path'            =>  dirname(__FILE__) . '/sql',
                'yaml_schema_path'    =>  dirname(__FILE__),);

$cli = new Doctrine_Cli($config);
$cli->run($_SERVER['argv']);