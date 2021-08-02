var btnLogin = document.getElementById('login');
var inputEmail = document.getElementById('email');
var inputPassword = document.getElementById('senha');


btnLogin.addEventListener('click', function () {

    firebase.auth().signInWithEmailAndPassword(inputEmail.value, inputPassword.value).then(function (result) {
        //alert("Usuário Conectado!");
         console.log("Success!");
        firebase.auth().setPersistence(firebase.auth.Auth.Persistence.LOCAL).then(function() {
      console.log("successfully set the persistence");
    })
    .catch(function(error){
    console.log("failed to ser persistence: " + error.message)
  });
   console.log("login aprovado");
        window.location.replace('verifica_usuario.php?email='+inputEmail.value);
 console.log(inputEmail);
    }).catch(function (error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // ...

        alert('Erro');
       console.log("Failure!")
    });

});