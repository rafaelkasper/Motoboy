<!--MENU DE NAVEGAÇÃO-->
<nav class="bg-dark navbar-expand-lg navbar-dark border border-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav">
            <li class="nav-item pl-3 pr-3">
              
                <img src="images/icons/favicon.png" width="40px">
            </li>
              <li class="nav-item pl-3 pr-3">
                  <a class="navbar-brand" href="#" style="font-family: 'Aclonica', sans-serif;">duMotoca</a>
            </li>
            <li class="nav-item text-white bg-dark pl-3 pr-3">
                <a class="nav-link text-white"  href="ads_index.php"><strong><i class="fas fa-home"></i>&nbsp;&nbsp;INÍCIO</strong></a>
            </li>
            
            <li class="nav-item dropdown pl-3 pr-3">
                <a class="nav-link dropdown-toggle text-white bg-dark" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong><i class="fas fa-wrench"></i>&nbsp;&nbsp;ALTERAR</strong></a>
                <div class="dropdown-menu bg-dark">
                     <a class="dropdown-item text-white bg-dark" href="adicionar_admin.php"><i class="fas fa-user-plus text-white"></i>&nbsp;&nbsp;&nbsp;ADICIONAR ADMINISTRADOR</a>
                     <a class="dropdown-item text-white bg-dark" href="novos_motoristas.php"><i class="fas fa-plus-circle text-white"></i>&nbsp;&nbsp;&nbsp;LIBERAR NOVO MOTOBOY</a>
                <!--    <a class="dropdown-item text-white bg-dark" href="alterar_valor.php"><i class="fas fa-money-bill text-white"></i>&nbsp;&nbsp;&nbsp;VALOR DA CORRIDA</a> -->
                </div>
            </li>
            <li class="nav-item dropdown pl-3 pr-3">
                <a class="nav-link dropdown-toggle text-white bg-dark" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><strong><i class="fas fa-search"></i> &nbsp;&nbsp; CONSULTAR</strong></a>
                <div class="dropdown-menu bg-dark">
                    <a class="dropdown-item text-white bg-dark" href="consultar_motoboy.php"><i class="fas fa-biking text-white"></i>&nbsp;&nbsp;&nbsp;MOTOBOY</a>
                    <a class="dropdown-item text-white bg-dark" href="consultar_usuarios.php"><i class="fas fa-users text-white"></i>&nbsp;&nbsp;&nbsp;USUÁRIO</a>
                    <a class="dropdown-item text-white bg-dark" href="consultar_viagens.php"><i class="fas fa-suitcase text-white"></i>&nbsp;&nbsp;&nbsp;&nbsp;VIAGENS</a>
                    
                   
                </div>
            </li>
           
            <li class="nav-item text-white bg-danger pl-3 pr-3" style="float: right;">
                <a class="nav-link text-white"  onclick="sair();"><strong><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;SAIR</strong></a>
            </li>
        </ul>
    </div>
</nav>

<script>
    function sair(){
firebase.auth().signOut().then(function() {
  // Sign-out successful.
  window.location.replace('../index.php');

}).catch(function(error) {
  // An error happened.
});
    }
</script>