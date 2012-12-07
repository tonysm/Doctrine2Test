<?php

// show errors
ini_set('display_errors', 1);

define('DS', DIRECTORY_SEPARATOR);
define('PS', PATH_SEPARATOR);

// adicionando o diretório do DOCTRINE como padrão das buscas do PHP
set_include_path(realpath(__DIR__ . DS . "library") . PS . get_include_path());


// O doctrine possui um método para autocarregar as classes da aplicação, 
// vamos utilizá-lo
require_once "Doctrine/Common/ClassLoader.php";

$classLoader = new \Doctrine\Common\ClassLoader();
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Application\Entities', __DIR__ . DS . "Application" . DS ."Entities");
$classLoader->register();

// algumas configurações da aplicação
require_once "bootstrap.php";