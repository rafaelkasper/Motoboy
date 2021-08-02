<?php
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory())->withDatabaseUri('https://dumotoca-9af7e.firebaseio.com');
$database = $factory->createDatabase();
$id = $_GET['id'];

$database->getReference('usuarios/'.$id)->set(null);


 header("Location: consultar_motoboy.php");

