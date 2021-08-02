<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <!-- Custom styles-path -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome kit script -->
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

    <!-- Google Fonts Open Sans-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Favicon -->
     <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome kit script -->
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

    <!-- Google Fonts Open Sans-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    
    <script>
         function toggleSignIn() {
        var email = document.getElementById('email').value;
        var password = document.getElementById('senha').value;
            firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
          // Handle Errors here.
          var errorCode = error.code;
          var errorMessage = error.message;
          // [START_EXCLUDE]
          if (errorCode === 'auth/wrong-password') {
            alert('A senha não confere!');
          } else {
            alert('Os dados de login não estão corretos!');
          }
          console.log('Erro');
         window.location.href = "ads_index.php";
        });
    }
    
    
  function initApp() {
             // Listening for auth state changes.
      // [START authstatelistener]
      firebase.auth().onAuthStateChanged(function(user) {
    
        if (user) {
          // User is signed in.
          var displayName = user.displayName;
          var email = user.email;
          var emailVerified = user.emailVerified;
          var photoURL = user.photoURL;
          var isAnonymous = user.isAnonymous;
          var uid = user.uid;
          var providerData = user.providerData;
        }
         } 
         else {
             
       }
        );
          document.getElementById('login').addEventListener('click', toggleSignIn, false);
     }
     
     
    window.onload = function() {
      initApp();
    };
        
        </script>
</head>

<body>
    <img class="wave" src="img/wave.svg">
    <div class="container">
        <div class="img">
            <img src="img/authentication.svg">
        </div>
        <div class="login-container">
            <form>
                <h2>Entrar</h2>
                <p>Bem-vindo de volta !</p>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Usuário</h5>
                        <input class="input" type="text" id="email">
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-key"></i>
                    </div>
                    <div>
                        <h5>Senha</h5>
                        <input class="input" type="password" id="senha">
                    </div>
                </div>
                <input type="button" class="btn" id="login" value="Entrar">
              
            </form>
        </div>
    </div>


  <script src="https://www.gstatic.com/firebasejs/5.8.5/firebase.js"></script>
  <script src="js/app.js"></script>
  <script src="js/authentication.js"></script>
  <script src="js/form.js"></script>
</body>

</html>