<?php
//include '../functions/valida_sessao_ads.php';
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory())->withDatabaseUri('https://dumotoca-9af7e.firebaseio.com');
$database = $factory->createDatabase();



if (IsSet($_POST['pesquisar'])){
$pesquisar = $_POST['pesquisar'];}
 else {
    $pesquisar = "";
}
if(isset($_POST['select'])){
$select = $_POST['select'];}
 else {
    $select = "";
}

 $valor = $database->getReference('corrida')->getSnapshot()->getValue();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>VALOR CORRIDA</title>
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

            <h3 style="text-align: center"><i class="fas fa-biking"></i>&nbsp;&nbsp; VALOR DA CORRIDA</h3> 
            <br>
            
            
            
             <form class="form-inline align-items-center d-flex justify-content-center" method="POST" action="salvar_alterar_valor.php">
                    <br>
                     <?php   foreach ($valor as $val) : ?>
                    <label class="my-1 mr-2 form-control-lg" for="valor">Valor:  </label>
                  <input type="text" class="my-1 mr-2 form-control-lg" id="valor" name="valor" value="<?php echo $val['valor']; ?>">
                    <input type="hidden" name="id" value="<?php echo $val['id']; ?>"> 
                    <button type="submit" name="alterar" class="btn  btn-lg btn-danger my-1 mr-sm-2"><i class="fas fa-wrench"></i>&nbsp;&nbsp;Alterar</button>
                 <?php                            endforeach; ?>
                </form>
            
            
  
         
        </div>
      
         <script src="https://www.gstatic.com/firebasejs/5.8.5/firebase.js"></script>
  <script src="js/app.js"></script>
    </body>
</html>
