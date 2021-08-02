<?php

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory())->withDatabaseUri('https://dumotoca-9af7e.firebaseio.com');
$database = $factory->createDatabase();
$id = $_POST['id'];
$status =  $_POST['select'];

 
 $database->getReference('usuarios/'. $id)
   ->update([
       'status' => $status
      ]);


 header("Location: consultar_motoboy.php");
