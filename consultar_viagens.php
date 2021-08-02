<?php
//include '../functions/valida_sessao_ads.php';
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory())->withDatabaseUri('https://dumotoca-9af7e.firebaseio.com');
$database = $factory->createDatabase();
// $viagens = $database->getReference('viagens')->getSnapshot();
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

?>

<!DOCTYPE html>
<html>
    <head>
        <title>CONSULTAR VIAGENS</title>
         <meta charset="UTF-8">
          <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
        <script src="https://kit.fontawesome.com/3e57d278d3.js" crossorigin="anonymous"></script>
        <link href='css/personalizado.css' rel='stylesheet' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
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

            <h3 style="text-align: center"><i class="fas fa-suitcase"></i>&nbsp;&nbsp;CONSULTAR VIAGENS</h3> 
            <br>
            <div class="container-fluid">
                <!--FORMULÁRIO PARA ALTERAR DADOS-->
                <form class="form-inline align-items-center d-flex justify-content-center" method="POST" action="">
                    <br>

                    <label class="my-1 mr-2" for="select">Tipo de Pesquisa</label>
                    <select class="custom-select my-1 mr-sm-2" id="select" name="select">
                        <option selected>Escolher...</option>
                        <option value="idm">Id do motorista</option>
                        <option value="nm">Nome do motorista</option>
                        <option value="idv">Id da viagem</option>
                        <option value="dat">Data</option>
                        <option value="all">Todas as viagens</option>
                    </select>

               
                    <input type="text" class="form-control my-1 mr-sm-2" id="tag" name="tag" placeholder="Digite para pesquisar">

                    <button type="submit" name="pesquisar" class="btn btn-primary my-1 mr-sm-2"><i class="fas fa-paper-plane"></i>&nbsp;&nbsp;Enviar</button>
                </form>


            </div>
            <br>

            <div class="overflow-x:auto">

                <?php
                
                 
                 
                if ($select == "idv") {//idViagem
                    $viagens = $database->getReference('viagens/' . $_POST['tag'])->getSnapshot()->getValue();

                     echo " <table class=\"table table-bordered table-hover table-responsive-xl\">";
                   // foreach ($viagens as $viagens) :

                    echo "<thead class='thead-dark'>";
                    echo "<th>"."Id Viagem"."</th>";
                    echo "<th>" . "Id Motorista" . "</th>";
                    echo "<th>" . "Nome motorista" . "</th>";
                    echo "<th>"."Id da requisição"."</th>";
                    echo "<th>"."Nome do passageiro"."</th>";
                    echo "<th>"."Id do passageiro"."</th>";
                    echo "<th>"."Local Inicial"."</th>";
                    echo "<th>"."Destino"."</th>";
                    echo "<th>" . "Data" . "</th>";
                    echo "<th>"."Tipo de pagamento"."</th>";
                    echo "<th>"."Valor"."</th>";
                    echo "<th>"."Ação"."</th>";
              
                    echo "</thead>";
                     echo "<tr>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['id'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['idMotorista'] . "</td>";
                    echo "<td class='align-middle'>" . $viagens['nomeMotorista'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['idRequisicao'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['nomePassageiro'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['idPassageiro'] . "</td>";
                     echo "<td class='align-middle' style='text-align: center;'>" . $viagens['localOrigem'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['destino'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['data'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['tipoPagamento'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['valor'] . "</td>";
                 ?>
                
                <td><a class="btn btn-success btn-sm text-white" role="button" href="detalhes_viagem.php?id=<?php echo $viagens['id'];?>">Detalhes</a><br><br></td>
                
                    <?php
                    echo "</tr>";
                   //  endforeach;
                    echo "</table>";
                    
                    
                } elseif ($select == "nm") {//nome motorista
                    $viagens = $database->getReference('viagens')->orderByChild('nomeMotorista')->equalTo($_POST['tag'])->getSnapshot()->getValue();
                     echo " <table class=\"table table-bordered table-hover table-responsive-xl\">";
                     echo "<thead class='thead-dark'>";
                    echo "<th>"."Id Viagem"."</th>";
                    echo "<th>" . "Id Motorista" . "</th>";
                    echo "<th>" . "Nome motorista" . "</th>";
                    echo "<th>"."Id da requisição"."</th>";
                    echo "<th>"."Nome do passageiro"."</th>";
                    echo "<th>"."Id do passageiro"."</th>";
                    echo "<th>"."Local Inicial"."</th>";
                    echo "<th>"."Destino"."</th>";
                    echo "<th>" . "Data" . "</th>";
                    echo "<th>"."Tipo de pagamento"."</th>";
                    echo "<th>"."Valor"."</th>";
                     echo "<th>"."Ação"."</th>";
                    
                    echo "</thead>";
                    foreach ($viagens as $viagens) :
                  
                     echo "<tr>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['id'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['idMotorista'] . "</td>";
                    echo "<td class='align-middle'>" . $viagens['nomeMotorista'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['idRequisicao'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['nomePassageiro'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['idPassageiro'] . "</td>";
                     echo "<td class='align-middle' style='text-align: center;'>" . $viagens['localOrigem'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['destino'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['data'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['tipoPagamento'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['valor'] . "</td>";
          ?>
                <td><a class="btn btn-success btn-sm text-white" role="button" href="detalhes_viagem.php?id=<?php echo $viagens['id'];?>">Detalhes</a><br><br></td>
                    <?php
                    echo "</tr>";
                     endforeach;
                    echo "</table>";
                    
                    
                } elseif ($select == "idm") {//id motorista
                    $viagens = $database->getReference('viagens')->orderByChild('idMotorista')->equalTo($_POST['tag'])->getSnapshot()->getValue();
                     echo " <table class=\"table table-bordered table-hover table-responsive-xl\">";
                     echo "<thead class='thead-dark'>";
                    echo "<th>"."Id Viagem"."</th>";
                    echo "<th>" . "Id Motorista" . "</th>";
                    echo "<th>" . "Nome motorista" . "</th>";
                    echo "<th>"."Id da requisição"."</th>";
                    echo "<th>"."Nome do passageiro"."</th>";
                    echo "<th>"."Id do passageiro"."</th>";
                    echo "<th>"."Local Inicial"."</th>";
                    echo "<th>"."Destino"."</th>";
                    echo "<th>" . "Data" . "</th>";
                    echo "<th>"."Tipo de pagamento"."</th>";
                    echo "<th>"."Valor"."</th>";
                     echo "<th>"."Ação"."</th>";
                    
                    echo "</thead>";
                    foreach ($viagens as $viagens) :
                  
                      echo "<tr>";
                     echo "<td class='align-middle' style='text-align: center;'>" . $viagens['id'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['idMotorista'] . "</td>";
                    echo "<td class='align-middle'>" . $viagens['nomeMotorista'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['idRequisicao'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['nomePassageiro'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['idPassageiro'] . "</td>";
                     echo "<td class='align-middle' style='text-align: center;'>" . $viagens['localOrigem'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['destino'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['data'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['tipoPagamento'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['valor'] . "</td>";
                     ?>
                <td><a class="btn btn-success btn-sm text-white" role="button" href="detalhes_viagem.php?id=<?php echo $viagens['id'];?>">Detalhes</a><br><br></td>
                    <?php
                    echo "</tr>";
                    endforeach;
                    echo "</table>";
                    
                    
                } elseif ($select == "dat") { //data
                   $viagens = $database->getReference('viagens')->orderByChild('data')->equalTo($_POST['tag'])->getSnapshot()->getValue();
                     echo " <table class=\"table table-bordered table-hover table-responsive-xl\">";
                     echo "<thead class='thead-dark'>";
                    echo "<th>"."Id Viagem"."</th>";
                    echo "<th>" . "Id Motorista" . "</th>";
                    echo "<th>" . "Nome motorista" . "</th>";
                    echo "<th>"."Id da requisição"."</th>";
                    echo "<th>"."Nome do passageiro"."</th>";
                    echo "<th>"."Id do passageiro"."</th>";
                    echo "<th>"."Local Inicial"."</th>";
                    echo "<th>"."Destino"."</th>";
                    echo "<th>" . "Data" . "</th>";
                    echo "<th>"."Tipo de pagamento"."</th>";
                    echo "<th>"."Valor"."</th>";
                     echo "<th>"."Ação"."</th>";
                    
                    echo "</thead>";
                    foreach ($viagens as $viagens) :
                   
                     echo "<tr>";
                     echo "<td class='align-middle' style='text-align: center;'>" . $viagens['id'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['idMotorista'] . "</td>";
                    echo "<td class='align-middle'>" . $viagens['nomeMotorista'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['idRequisicao'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['nomePassageiro'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['idPassageiro'] . "</td>";
                     echo "<td class='align-middle' style='text-align: center;'>" . $viagens['localOrigem'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['destino'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['data'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['tipoPagamento'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['valor'] . "</td>";
                     ?>
                <td><a class="btn btn-success btn-sm text-white" role="button" href="detalhes_viagem.php?id=<?php echo $viagens['id'];?>">Detalhes</a><br><br></td>
                    <?php
                    echo "</tr>";
                    endforeach;
                    echo "</table>";
                } 
                
                
                elseif($select == "all") { // todas
                    $viagens = $database->getReference('viagens')->getSnapshot()->getValue();
                    echo " <table class=\"table table-bordered table-hover table-responsive-xl\">";
                     echo "<thead class='thead-dark'>";
                    echo "<th>"."Id Viagem"."</th>";
                    echo "<th>" . "Id Motorista" . "</th>";
                    echo "<th>" . "Nome motorista" . "</th>";
                    echo "<th>"."Id da requisição"."</th>";
                    echo "<th>"."Nome do passageiro"."</th>";
                    echo "<th>"."Id do passageiro"."</th>";
                    echo "<th>"."Local Inicial"."</th>";
                    echo "<th>"."Destino"."</th>";
                    echo "<th>" . "Data" . "</th>";
                    echo "<th>"."Tipo de pagamento"."</th>";
                    echo "<th>"."Valor"."</th>";
                    echo "<th>"."Ação"."</th>";
                    
                    echo "</thead>";
                    foreach ($viagens as $viagens) :
                       
                     echo "<tr>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['id'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['idMotorista'] . "</td>";
                    echo "<td class='align-middle'>" . $viagens['nomeMotorista'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['idRequisicao'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['nomePassageiro'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['idPassageiro'] . "</td>";
                     echo "<td class='align-middle' style='text-align: center;'>" . $viagens['localOrigem'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['destino'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['data'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['tipoPagamento'] . "</td>";
                    echo "<td class='align-middle' style='text-align: center;'>" . $viagens['valor'] . "</td>";
               ?>
                <td><a class="btn btn-success btn-sm text-white" role="button" href="detalhes_viagem.php?id=<?php echo $viagens['id'];?>">Detalhes</a><br><br></td>
                    <?php
                    echo "</tr>";
                    endforeach;
                    echo "</table>";
                }
                ?>          
            </div>
            
             <script src="https://www.gstatic.com/firebasejs/5.8.5/firebase.js"></script>
  <script src="js/app.js"></script>
    </body>
</html>