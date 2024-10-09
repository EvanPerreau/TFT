<?php
require_once 'Helpers/Psr4AutoloaderClass.php';

$loader = new \Helpers\Psr4AutoloaderClass;

$loader->register();
$loader->addNamespace('\Helpers', '/Helpers');
$loader->addNamespace('\League\Plates\\', '/Vendor/Plates/src');

$engine = new \League\Plates\Engine('Views');
echo $engine->render('home', ['tftSetName' => 'Set 3']);