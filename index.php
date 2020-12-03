<?php

//including system files
define('ROOT', dirname(__FILE__));

require_once(ROOT.'/routing/Router.php');
require_once(ROOT.'/data/connection.php');


// Calling Router

$router = new Router();
$router->run();