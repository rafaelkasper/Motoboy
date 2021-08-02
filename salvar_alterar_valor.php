<?php

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory())->withDatabaseUri('https://dumotoca-9af7e.firebaseio.com');
$database = $factory->createDatabase();
$id = $_POST['id'];
$valor =  $_POST['valor'];

 
 $database->getReference('corrida/'. $id)
   ->update([
       'valor' => $valor
      ]);


 header("Location: ads_index.php");