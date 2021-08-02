<?php
//include '../functions/valida_sessao_ads.php';
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory())->withDatabaseUri('https://dumotoca-9af7e.firebaseio.com');
$database = $factory->createDatabase();
$idMotorista = $_GET['id'];


?>

<!DOCTYPE html>
<html>
    <head>
        <title>CONSULTAR VIAGENS MOTOBOY</title>
        <meta charset="UTF-8">
          <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
         <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
        <link href='css/personalizado.css' rel='stylesheet' />
        <script src="https://kit.fontawesome.com/3e57d278d3.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
       <script src="https://kit.fontawesome.com/3e57d278d3.js" crossorigin="anonymous"></script>

       <script>
     function verificar() {
     const user = firebase.auth().currentUser;
     firebase.auth().onAuthStateChanged(user => {
  if (user) {
    // User is signed in.
          var displayName = user.displayName;
          var email = user.email;
          var emailVerified = user.emailVerified;
          var photoURL = user.photoURL;
          var isAnonymous = user.isAnonymous;
          var uid = user.uid;
          
  }
  else {
     window.location.href = "index.php";
  }
})
     }

window.onload = function() {
      verificar();
    };
     </script>
     
    </head>
    <header>
        <?php
        include 'menu_ads.php';
   
        ?>

    </header>

    <body class="bg-light">

        <div class="container">

            <?php
             echo '<br>';
            echo '<br>';
            include 'functions/data_include.php';

         
            ?>
            <br>
            <br>

            <h3 style="text-align: center"><i class="fas fa-biking"></i>&nbsp;&nbsp; CONSULTAR VIAGEM POR MOTOBOY</h3> 
            
            
            <br>
            
          <a class="btn btn-dark btn-lg text-white align-items-center d-flex justify-content-center" role="button" href="consultar_viagens_motoboy_todas.php?id=<?php echo $idMotorista;?>">TODAS</a><br>
          <a class="btn btn-dark btn-lg text-white align-items-center d-flex justify-content-center" role="button" href="consultar_viagens_motoboy_cartao.php?id=<?php echo $idMotorista;?>">PAGAMENTO COM CARTÃO</a><br>
          <a class="btn btn-dark btn-lg text-white align-items-center d-flex justify-content-center" role="button" href="consultar_viagens_motoboy_dinheiro.php?id=<?php echo $idMotorista;?>">PAGAMENTO COM DINHEIRO</a><br>
            
            <br>