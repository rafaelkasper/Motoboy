<?php
//include '../functions/valida_sessao_ads.php';
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

session_start();
$factory = (new Factory())->withDatabaseUri('https://dumotoca-9af7e.firebaseio.com');
$database = $factory->createDatabase();
$idMotorista = $_GET['id'];


if (IsSet($_POST['pesquisar'])) {
    $pesquisar = $_POST['pesquisar'];
} else {
    $pesquisar = "";
}
if (isset($_POST['select'])) {
    $select = $_POST['select'];
} else {
    $select = "";
}

if (isset($_POST['ano'])) {
    $data = $_POST['ano'];
} else {
    $data = "";
}
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

                    } else {
                        window.location.href = "index.php";
                    }
                })
            }

            window.onload = function () {
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

            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <br>
            <br>

            <h3 style="text-align: center"><i class="fas fa-biking"></i>&nbsp;&nbsp; CONSULTAR VIAGEM POR MOTOBOY - CARTÃO</h3> 
            <br>

            <div class="container-fluid"  >
                <!--FORMULÁRIO PARA ALTERAR DADOS-->
                <form class="form-inline align-items-center d-flex justify-content-center" method="POST" action="">
                    <br>
                    <label class="my-1 mr-2" for="select">SELECIONE O MÊS</label>
                    <select class="custom-select my-1 mr-sm-2" id="select" name="select">
                        <option selected>Escolher...</option>
                        <option value="jan">JANEIRO</option>
                        <option value="fev">FEVEREIRO</option>
                        <option value="mar">MARCO</option>
                        <option value="abr">ABRIL</option>
                        <option value="mai">MAIO</option>
                        <option value="jun">JUNHO</option>
                        <option value="jul">JULHO</option>
                        <option value="ago">AGOSTO</option>
                        <option value="set">SETEMBRO</option>
                        <option value="out">OUTUBRO</option>
                        <option value="nov">NOVEMBRO</option>
                        <option value="dez">DEZEMBRO</option>
                    </select>

                    <label class="my-1 mr-2" for="ano">SELECIONE O ANO</label>
                    <select class="custom-select my-1 mr-sm-2" id="ano" name="ano">
                        <option >Escolher...</option>
                        <option  value="2020">2020</option>
                         <option  value="2021">2021</option>
                          <option  value="2022">2022</option>
                           <option  value="2023">2023</option>
                            <option  value="2024">2024</option>
                             <option  value="2025">2025</option>

                    </select>
                    <button type="submit" name="pesquisar" class="btn btn-primary my-1 mr-sm-2"><i class="fas fa-paper-plane"></i>&nbsp;&nbsp;Enviar</button>
                </form>


            </div>
            <br>

            <div class="overflow-x:auto">

                <?php
                if ($select == "jan") {
                    $motorista = $database->getReference('viagens')->orderByChild('idMotorista')->equalTo($idMotorista)->getSnapshot()->getValue();
                    echo " <table class=\"table table-bordered table-hover table-responsive-xl\">";
                    echo "<thead class='thead-dark'>";
                    echo "<th>" . "Nome" . "</th>";
                    echo "<th>" . "Data" . "</th>";
                    echo "<th>" . "Tipo de pagamento" . "</th>";
                    echo "<th>" . "Valor" . "</th>";
                    echo "</thead>";
                    foreach ($motorista as $pesq) :
                        if (($pesq['ano'] == $ano) && ($pesq['mes'] == '01') && ($pesq['tipoPagamento'] == "Cartão")) {
                            echo "<tr>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['nomeMotorista'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['data'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['tipoPagamento'] . "</td>";
                            echo "<td class='align-middle valor-calculado' style='text-align: center;'>" . $pesq['valor'] . "</td>";
                            echo "</tr>";
                        }
                    endforeach;
                    echo "<tr>";

                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td class='align-right' style='text-align: right;'><strong> TOTAL: </strong> </td>";
                    echo "<td class='align-middle bg-success text-white' style='text-align: center;'> <strong><p id='qtdtotal'></p></strong></td>";
                    echo "</tr>";
                    echo "</table>";
                } elseif ($select == "fev") {
                    $motorista = $database->getReference('viagens')->orderByChild('idMotorista')->equalTo($idMotorista)->getSnapshot()->getValue();
                    echo " <table class=\"table table-bordered table-hover table-responsive-xl\">";
                    echo "<thead class='thead-dark'>";
                    echo "<th>" . "Nome" . "</th>";
                    echo "<th>" . "Data" . "</th>";
                    echo "<th>" . "Tipo de pagamento" . "</th>";
                    echo "<th>" . "Valor" . "</th>";
                    echo "</thead>";
                    foreach ($motorista as $pesq) :
                        if (($pesq['ano'] == $ano) && ($pesq['mes'] == '02') && ($pesq['tipoPagamento'] == "Cartão")) {
                            echo "<tr>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['nomeMotorista'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['data'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['tipoPagamento'] . "</td>";
                            echo "<td class='align-middle valor-calculado' style='text-align: center;'>" . $pesq['valor'] . "</td>";
                            echo "</tr>";
                        }
                    endforeach;
                    echo "<tr>";

                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td class='align-right' style='text-align: right;'><strong> TOTAL: </strong> </td>";
                    echo "<td class='align-middle bg-success text-white' style='text-align: center;'> <strong><p id='qtdtotal'></p></strong></td>";
                    echo "</tr>";
                    echo "</table>";
                } elseif ($select == "mar") {
                    $motorista = $database->getReference('viagens')->orderByChild('idMotorista')->equalTo($idMotorista)->getSnapshot()->getValue();
                    echo " <table class=\"table table-bordered table-hover table-responsive-xl\">";
                    echo "<thead class='thead-dark'>";
                    echo "<th>" . "Nome" . "</th>";
                    echo "<th>" . "Data" . "</th>";
                    echo "<th>" . "Tipo de pagamento" . "</th>";
                    echo "<th>" . "Valor" . "</th>";
                    echo "</thead>";
                    foreach ($motorista as $pesq) :
                        if (($pesq['ano'] == $ano) && ($pesq['mes'] == '03') && ($pesq['tipoPagamento'] == "Cartão")) {
                            echo "<tr>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['nomeMotorista'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['data'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['tipoPagamento'] . "</td>";
                            echo "<td class='align-middle valor-calculado' style='text-align: center;'>" . $pesq['valor'] . "</td>";
                            echo "</tr>";
                        }
                    endforeach;
                    echo "<tr>";

                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td class='align-right' style='text-align: right;'><strong> TOTAL: </strong> </td>";
                    echo "<td class='align-middle bg-success text-white' style='text-align: center;'> <strong><p id='qtdtotal'></p></strong></td>";
                    echo "</tr>";
                    echo "</table>";
                } elseif ($select == "abr") {
                    $motorista = $database->getReference('viagens')->orderByChild('idMotorista')->equalTo($idMotorista)->getSnapshot()->getValue();
                    echo " <table class=\"table table-bordered table-hover table-responsive-xl\">";
                    echo "<thead class='thead-dark'>";
                    echo "<th>" . "Nome" . "</th>";
                    echo "<th>" . "Data" . "</th>";
                    echo "<th>" . "Tipo de pagamento" . "</th>";
                    echo "<th>" . "Valor" . "</th>";
                    echo "</thead>";
                    foreach ($motorista as $pesq) :
                        if (($pesq['ano'] == $ano) && ($pesq['mes'] == '04') && ($pesq['tipoPagamento'] == "Cartão")) {
                            echo "<tr>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['nomeMotorista'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['data'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['tipoPagamento'] . "</td>";
                            echo "<td class='align-middle valor-calculado' style='text-align: center;'>" . $pesq['valor'] . "</td>";
                            echo "</tr>";
                        }
                    endforeach;
                    echo "<tr>";

                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td class='align-right' style='text-align: right;'><strong> TOTAL: </strong> </td>";
                    echo "<td class='align-middle bg-success text-white' style='text-align: center;'> <strong><p id='qtdtotal'></p></strong></td>";
                    echo "</tr>";
                    echo "</table>";
                } elseif ($select == "mai") {
                    $motorista = $database->getReference('viagens')->orderByChild('idMotorista')->equalTo($idMotorista)->getSnapshot()->getValue();
                    echo " <table class=\"table table-bordered table-hover table-responsive-xl\">";
                    echo "<thead class='thead-dark'>";
                    echo "<th>" . "Nome" . "</th>";
                    echo "<th>" . "Data" . "</th>";
                    echo "<th>" . "Tipo de pagamento" . "</th>";
                    echo "<th>" . "Valor" . "</th>";
                    echo "</thead>";
                    foreach ($motorista as $pesq) :
                        if (($pesq['ano'] == $ano) && ($pesq['mes'] == '05') && ($pesq['tipoPagamento'] == "Cartão")) {
                            echo "<tr>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['nomeMotorista'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['data'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['tipoPagamento'] . "</td>";
                            echo "<td class='align-middle valor-calculado' style='text-align: center;'>" . $pesq['valor'] . "</td>";
                            echo "</tr>";
                        }
                    endforeach;
                    echo "<tr>";

                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td class='align-right' style='text-align: right;'><strong> TOTAL: </strong> </td>";
                    echo "<td class='align-middle bg-success text-white' style='text-align: center;'> <strong><p id='qtdtotal'></p></strong></td>";
                    echo "</tr>";
                    echo "</table>";
                } elseif ($select == "jun") {
                    $motorista = $database->getReference('viagens')->orderByChild('idMotorista')->equalTo($idMotorista)->getSnapshot()->getValue();
                    echo " <table class=\"table table-bordered table-hover table-responsive-xl\">";
                    echo "<thead class='thead-dark'>";
                    echo "<th>" . "Nome" . "</th>";
                    echo "<th>" . "Data" . "</th>";
                    echo "<th>" . "Tipo de pagamento" . "</th>";
                    echo "<th>" . "Valor" . "</th>";
                    echo "</thead>";
                    foreach ($motorista as $pesq) :
                        if (($pesq['ano'] == $ano) && ($pesq['mes'] == '06') && ($pesq['tipoPagamento'] == "Cartão")) {
                            echo "<tr>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['nomeMotorista'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['data'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['tipoPagamento'] . "</td>";
                            echo "<td class='align-middle valor-calculado' style='text-align: center;'>" . $pesq['valor'] . "</td>";
                            echo "</tr>";
                        }
                    endforeach;
                    echo "<tr>";

                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td class='align-right' style='text-align: right;'><strong> TOTAL: </strong> </td>";
                    echo "<td class='align-middle bg-success text-white' style='text-align: center;'> <strong><p id='qtdtotal'></p></strong></td>";
                    echo "</tr>";
                    echo "</table>";
                } elseif ($select == "jul") {
                    $motorista = $database->getReference('viagens')->orderByChild('idMotorista')->equalTo($idMotorista)->getSnapshot()->getValue();
                    echo " <table class=\"table table-bordered table-hover table-responsive-xl\">";
                    echo "<thead class='thead-dark'>";
                    echo "<th>" . "Nome" . "</th>";
                    echo "<th>" . "Data" . "</th>";
                    echo "<th>" . "Tipo de pagamento" . "</th>";
                    echo "<th>" . "Valor" . "</th>";
                    echo "</thead>";
                    foreach ($motorista as $pesq) :
                        if (($pesq['ano'] == $ano) && ($pesq['mes'] == '07') && ($pesq['tipoPagamento'] == "Cartão")) {
                            echo "<tr>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['nomeMotorista'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['data'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['tipoPagamento'] . "</td>";
                            echo "<td class='align-middle valor-calculado' style='text-align: center;'>" . $pesq['valor'] . "</td>";
                            echo "</tr>";
                        }
                    endforeach;
                    echo "<tr>";

                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td class='align-right' style='text-align: right;'><strong> TOTAL: </strong> </td>";
                    echo "<td class='align-middle bg-success text-white' style='text-align: center;'> <strong><p id='qtdtotal'></p></strong></td>";
                    echo "</tr>";
                    echo "</table>";
                } elseif ($select == "ago") {
                    $motorista = $database->getReference('viagens')->orderByChild('idMotorista')->equalTo($idMotorista)->getSnapshot()->getValue();
                    echo " <table class=\"table table-bordered table-hover table-responsive-xl\">";
                    echo "<thead class='thead-dark'>";
                    echo "<th>" . "Nome" . "</th>";
                    echo "<th>" . "Data" . "</th>";
                    echo "<th>" . "Tipo de pagamento" . "</th>";
                    echo "<th>" . "Valor" . "</th>";
                    echo "</thead>";
                    foreach ($motorista as $pesq) :
                        if (($pesq['ano'] == $ano) && ($pesq['mes'] == '08') && ($pesq['tipoPagamento'] == "Cartão")) {
                            echo "<tr>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['nomeMotorista'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['data'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['tipoPagamento'] . "</td>";
                            echo "<td class='align-middle valor-calculado' style='text-align: center;'>" . $pesq['valor'] . "</td>";
                            echo "</tr>";
                        }
                    endforeach;
                    echo "<tr>";

                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td class='align-right' style='text-align: right;'><strong> TOTAL: </strong> </td>";
                    echo "<td class='align-middle bg-success text-white' style='text-align: center;'> <strong><p id='qtdtotal'></p></strong></td>";
                    echo "</tr>";
                    echo "</table>";
                } elseif ($select == "set") {
                    $motorista = $database->getReference('viagens')->orderByChild('idMotorista')->equalTo($idMotorista)->getSnapshot()->getValue();
                    echo " <table class=\"table table-bordered table-hover table-responsive-xl\">";
                    echo "<thead class='thead-dark'>";
                    echo "<th>" . "Nome" . "</th>";
                    echo "<th>" . "Data" . "</th>";
                    echo "<th>" . "Tipo de pagamento" . "</th>";
                    echo "<th>" . "Valor" . "</th>";
                    echo "</thead>";
                    foreach ($motorista as $pesq) :
                        if (($pesq['ano'] == $ano) && ($pesq['mes'] == '09') && ($pesq['tipoPagamento'] == "Cartão")) {
                            echo "<tr>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['nomeMotorista'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['data'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['tipoPagamento'] . "</td>";
                            echo "<td class='align-middle valor-calculado' style='text-align: center;'>" . $pesq['valor'] . "</td>";
                            echo "</tr>";
                        }
                    endforeach;
                    echo "<tr>";

                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td class='align-right' style='text-align: right;'><strong> TOTAL: </strong> </td>";
                    echo "<td class='align-middle bg-success text-white' style='text-align: center;'> <strong><p id='qtdtotal'></p></strong></td>";
                    echo "</tr>";
                    echo "</table>";
                } elseif ($select == "out") {
                    $motorista = $database->getReference('viagens')->orderByChild('idMotorista')->equalTo($idMotorista)->getSnapshot()->getValue();
                    echo " <table class=\"table table-bordered table-hover table-responsive-xl\">";
                    echo "<thead class='thead-dark'>";
                    echo "<th>" . "Nome" . "</th>";
                    echo "<th>" . "Data" . "</th>";
                    echo "<th>" . "Tipo de pagamento" . "</th>";
                    echo "<th>" . "Valor" . "</th>";
                    echo "</thead>";
                    foreach ($motorista as $pesq) :
                        if (($pesq['ano'] == $ano) && ($pesq['mes'] == '10') && ($pesq['tipoPagamento'] == "Cartão")) {
                            echo "<tr>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['nomeMotorista'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['data'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['tipoPagamento'] . "</td>";
                            echo "<td class='align-middle valor-calculado' style='text-align: center;'>" . $pesq['valor'] . "</td>";
                            echo "</tr>";
                        }
                    endforeach;
                    echo "<tr>";

                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td class='align-right' style='text-align: right;'><strong> TOTAL: </strong> </td>";
                    echo "<td class='align-middle bg-success text-white' style='text-align: center;'> <strong><p id='qtdtotal'></p></strong></td>";
                    echo "</tr>";
                    echo "</table>";
                } elseif ($select == "nov") {
                    $motorista = $database->getReference('viagens')->orderByChild('idMotorista')->equalTo($idMotorista)->getSnapshot()->getValue();
                    echo " <table class=\"table table-bordered table-hover table-responsive-xl\">";
                    echo "<thead class='thead-dark'>";
                    echo "<th>" . "Nome" . "</th>";
                    echo "<th>" . "Data" . "</th>";
                    echo "<th>" . "Tipo de pagamento" . "</th>";
                    echo "<th>" . "Valor" . "</th>";
                    echo "</thead>";
                    foreach ($motorista as $pesq) :
                        if (($pesq['ano'] == $ano) && ($pesq['mes'] == '11') && ($pesq['tipoPagamento'] == "Cartão")) {
                            echo "<tr>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['nomeMotorista'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['data'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['tipoPagamento'] . "</td>";
                            echo "<td class='align-middle valor-calculado' style='text-align: center;'>" . $pesq['valor'] . "</td>";
                            echo "</tr>";
                        }
                    endforeach;
                    echo "<tr>";

                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td class='align-right' style='text-align: right;'><strong> TOTAL: </strong> </td>";
                    echo "<td class='align-middle bg-success text-white' style='text-align: center;'> <strong><p id='qtdtotal'></p></strong></td>";
                    echo "</tr>";
                    echo "</table>";
                } elseif ($select == "dez") {
                    $motorista = $database->getReference('viagens')->orderByChild('idMotorista')->equalTo($idMotorista)->getSnapshot()->getValue();
                    echo " <table class=\"table table-bordered table-hover table-responsive-xl\">";
                    echo "<thead class='thead-dark'>";
                    echo "<th>" . "Nome" . "</th>";
                    echo "<th>" . "Data" . "</th>";
                    echo "<th>" . "Tipo de pagamento" . "</th>";
                    echo "<th>" . "Valor" . "</th>";
                    echo "</thead>";
                    foreach ($motorista as $pesq) :
                        if (($pesq['ano'] == $ano) && ($pesq['mes'] == '12') && ($pesq['tipoPagamento'] == "Cartão")) {
                            echo "<tr>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['nomeMotorista'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['data'] . "</td>";
                            echo "<td class='align-middle' style='text-align: center;'>" . $pesq['tipoPagamento'] . "</td>";
                            echo "<td class='align-middle valor-calculado' style='text-align: center;'>" . $pesq['valor'] . "</td>";
                            echo "</tr>";
                        }
                    endforeach;
                    echo "<tr>";

                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td class='align-right' style='text-align: right;'><strong> TOTAL: </strong> </td>";
                    echo "<td class='align-middle bg-success text-white' style='text-align: center;'> <strong><p id='qtdtotal'></p></strong></td>";
                    echo "</tr>";
                    echo "</table>";
                }
                ?>   



            </div>
        </div>



        <script src="https://www.gstatic.com/firebasejs/5.8.5/firebase.js"></script>
        <script src="js/app.js"></script>
        <script>
               $(function () {

                   var valorCalculado = 0

                   $(".valor-calculado").each(function () {
                       var num = parseFloat($(this).text().replace(',', '.'));
                       valorCalculado += num;

                   });
                   $("#qtdtotal").text(valorCalculado.toFixed(2));

               });


        </script>
    </body>
</html>