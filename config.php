<?php

//We need to use an autoloader to import PHPOnCouch classes
//I will use composer's autoloader for this demo
$autoloader = join(DIRECTORY_SEPARATOR,[__DIR__,'vendor','Autoload.php']);
require $autoloader;

//We import the classes that we need
use PHPOnCouch\CouchClient;
use PHPOnCouch\Exceptions;

//We create a client to access the database
$client = new CouchClient('http://admin:password@localhost:5984','testdb');
