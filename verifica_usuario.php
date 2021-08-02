<?php
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory())->withDatabaseUri('insira seu firebase');
$database = $factory->createDatabase();

$email = $_GET['email'];

 $user= $database->getReference('admin')->orderByChild('email')->equalTo($email)->getSnapshot()->getValue();
 

 if($user != null){
      header("Location: ads_index.php");
 }else{
     ?>
<script>
   alert("Usuário não tem permissão para acessar a área administrativa!"); 
    window.location.replace('index.php');
</script>
    <?php
     
 }
