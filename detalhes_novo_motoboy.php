<?php
//EDITA AS INFORMAÇÕES SOBRE ADMINISTRADORES
//include '../functions/valida_sessao_ads.php';
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory())->withDatabaseUri('https://dumotoca-9af7e.firebaseio.com');
$database = $factory->createDatabase();
$id = $_GET['id'];
 $motorista = $database->getReference('usuarios')->orderByChild('id')->equalTo($id)->getSnapshot()->getValue();

?>


<!DOCTYPE html>
<html>
    <head>
        <title>DETALHES MOTORISTA</title>
        <meta charset="UTF-8">
         <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href='css/personalizado.css' rel='stylesheet' />
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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

            <h3><i class="fas fa-info-circle"></i>&nbsp;&nbsp;DETALHES MOTORISTA</h3>
            <form action="salvar_alteracao_motoboy.php" method="POST">
             <?php   foreach ($motorista as $motorista) : ?>

                <div class="form-group">
                    <label for="nome">NOME</label>
                    <input type="text" class="form-control" id="nome" name="nome" readonly value="<?php echo $motorista['nome']; ?>">
                </div>
                
                 <div class="form-group">
                        <label for="endereco">ENDEREÇO</label>
                        <input type="text" class="form-control" id="endereco" name="endereco"  readonly value="<?php echo $motorista['rua'] . " " . $motorista['numero'] . " " . $motorista['bairro'] . " " . $motorista['cidade'] . " " . $motorista['estado'] ; ?>">
                    </div>

                <div class="form-row">
                <div class="form-group col-md-6">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" readonly value="<?php echo $motorista['cpf']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">EMAIL</label>
                        <input type="email" class="form-control" id="email" name="email" readonly value="<?php echo $motorista['email']; ?>">
                    </div>
                </div>

                <div class="form-row">
                   
                    <div class="form-group col-md-6">
                        <label for="status">STATUS</label>
                        <input type="text" class="form-control" id="status" name="status" readonly value="<?php echo $motorista['status']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                         <label class="my-1 mr-2" for="select">Alterar Status</label>
                    <select class="custom-select my-1 mr-sm-2" id="select" name="select">
                        <option selected>Escolher...</option>
                        <option value="Aprovado">Aprovado</option>
                        <option value="Rejeitado">Rejeitado</option>
                        
                    </select>
                    </div>
                    
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" id="id" name="id" readonly value="<?php echo $motorista['id']; ?>">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="token">TOKEN</label>
                        <input type="text" class="form-control" id="token" name="token" readonly value="<?php echo $motorista['token']; ?>">
                    </div>
                </div>
                
                
                
                  <div class="form-row">
                      
                      <div class="form-group col-md-4">
                        <label for="foto">FOTO</label>
                        <p id="foto" name="foto"> <a href="#"  class="abrirModal"><img id="foto" width="150px" class="img-thumbnail" src="<?php echo $motorista['urlImagemFoto']; ?>"></a></p>
                    </div>
                      
                    <div class="form-group col-md-4">
                        <label for="cnh">CNH</label>
                        <p id="cnh" name="cnh"> <a href="#"  class="abrirModal"><img width="150px" class="img-thumbnail" src="<?php echo $motorista['urlImagemCnh']; ?>"></a></p>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="crlv">CRLV</label>
                        <p id="crlv" name="crlv"> <a href="#"  class="abrirModal"><img width="150px" class="img-thumbnail" src="<?php echo $motorista['urlImagemCrlv']; ?>"></a></p>
                    </div>
                      
                   
                </div>

                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <?php                            endforeach; ?>
                
                <button type="submit" class="btn btn-primary" style="float: right;">ALTERAR STATUS</button>
            </form>



        </div>
        <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body text-center">
          <img width="400px" src="" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
      </div>
    </div>
  </div>
</div>

        <script src="https://www.gstatic.com/firebasejs/5.8.5/firebase.js"></script>
  <script src="js/app.js"></script>
  <script>
    $(".abrirModal").click(function() {
  var url = $(this).find("img").attr("src");
  $("#myModal img").attr("src", url);
  $("#myModal").modal("show");
});
      </script>
    </body>
</html>