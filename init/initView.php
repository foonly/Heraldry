<?php

/*include twig*/
require_once '../lib/Twig/Autoloader.php';
Twig_Autoloader::register();

/*auto_reload value to refresh cache*/
$loader = new Twig_Loader_Filesystem('../templates');
$twig = new Twig_Environment($loader, array(
    'cache' => $setting['apath'].'/cache',
    'auto_reload' => true
));
/* finished loading twig*/