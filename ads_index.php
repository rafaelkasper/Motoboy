
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset='utf-8'/>
        <title>INÍCIO</title>
         <meta charset="UTF-8">
          <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
        <link href='css/personalizado.css' rel='stylesheet' />
        <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/3e57d278d3.js" crossorigin="anonymous"></script>
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
    <body style=" font-family: 'Open Sans',sans-serif;">
       
        <div class="container" style=" font-family: 'Open Sans',sans-serif;">
            <?php
            echo '<br>';
            echo '<br>';
           include 'functions/data_include.php';
            echo '<br>';
            echo '<br>';
            echo '<br>';
            echo '<br>';
            ?>
           
            
            <div class="card-deck">
  <div class="card text-center text-white bg-dark mb-3">

    <div class="card-body">
      <h5 class="card-title"><strong><i class="fas fa-search"></i> &nbsp;&nbsp; CONSULTAR</strong></h5>
      <hr class="bg-white">
      <a class="dropdown-item btn-lg text-white bg-dark" href="consultar_motoboy.php"><i class="fas fa-biking text-white"></i>&nbsp;&nbsp;&nbsp;MOTOBOY</a>
      <a class="dropdown-item btn-lg text-white bg-dark" href="consultar_usuarios.php"><i class="fas fa-users text-white"></i>&nbsp;&nbsp;&nbsp;USUÁRIO</a>
      <a class="dropdown-item btn-lg text-white bg-dark" href="consultar_viagens.php"><i class="fas fa-suitcase text-white"></i>&nbsp;&nbsp;&nbsp;&nbsp;VIAGENS</a>
      
    </div>
  </div>
  <div class="card text-center text-white bg-dark mb-3">
 
    <div class="card-body">
      <h5 class="card-title"><strong><i class="fas fa-wrench"></i>&nbsp;&nbsp;ALTERAR</strong></h5>
      <hr class="bg-white">
      <a class="dropdown-item btn-lg text-white bg-dark" href="adicionar_admin.php"><i class="fas fa-user-plus text-white"></i>&nbsp;&nbsp;&nbsp;ADICIONAR ADMINISTRADOR</a>
       <a class="dropdown-item btn-lg text-white bg-dark" href="novos_motoristas.php"><i class="fas fa-plus-circle text-white"></i>&nbsp;&nbsp;&nbsp;LIBERAR NOVO MOTOBOY</a>
   <!--  <a class="dropdown-item btn-lg text-white bg-dark" href="alterar_valor.php"><i class="fas fa-money-bill text-white"></i>&nbsp;&nbsp;&nbsp;VALOR DA CORRIDA</a> -->
    </div>
  </div>
 
</div>
            
            <!-- Custom scripts for all pages-->

  <script src="https://www.gstatic.com/firebasejs/5.8.5/firebase.js"></script>
  <script src="js/app.js"></script>
 

        
    </body>
</html>