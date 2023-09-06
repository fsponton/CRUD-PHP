<?php

require 'vendor/autoload.php';
require 'Alumnos_controller.php';

Flight::register('db','PDO',array('mysql:host=localhost;dbname=api','root',''));

Flight::route('GET /alumnos',['Alumnos_controller', 'get']);

Flight::route('POST /alumnos',['Alumnos_controller', 'add']);

Flight::route('DELETE /alumnos',['Alumnos_controller', 'borrar']);

Flight::route('PUT /alumnos',['Alumnos_controller', 'update']);

Flight::route('GET /alumnos/@id',['Alumnos_controller', 'getById']);

Flight::start();
