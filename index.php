<?php
// Include Config
require('config.php');

require('classes/Bootstrap.php');
require("classes/Controller.php");

require("controllers/home.php");

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if ($controller) {
    $controller->execueAction();
}