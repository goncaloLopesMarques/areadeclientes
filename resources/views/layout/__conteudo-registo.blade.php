<!--Main layout-->  
<script>
  function fillHiddenInputs(){
       var idCrm = document.getElementById('idCrm')
       var emailCrm = document.getElementById('emailCrm')
       var url = new URL(window.location.href);
       if(url.searchParams.get("id")){
        idCrm.value = url.searchParams.get("id");
       }else{
           alert("Não existe nenhum id por favor contactar, digitalinput@digitalinput.pt")
       }if(url.searchParams.get("email")){
        emailCrm.value = url.searchParams.get("email");
       }else{
           alert("naão existe nenhum email, contactar digitalinput@digitalinput.pt")
       }
        console.log(idCrm)
        console.log(emailCrm)
    }
</script>
<main class="mt-5 pt-5">
    <body onload="fillHiddenInputs();">
        <div class="container">
            <form onsubmit="register()" id="registerForm">
                <!--Grid row-->
                <div class="row wow fadeIn">
                    <!-- Default form contact -->
                        <div>
                        <p class="h4 text-center mb-4">Registo</p>
                        <div>
                        <!-- Default input name -->
                        <br>
                        <label for="defaultFormContactNameEx" class="grey-text">UserName</label>
                        <input type="text" id="inputName" class="form-control">
                        <a href="http://127.0.0.1/areacliente/rgpd/public/registo?id=2c1a8898-3f0e-cb24-2a0e-5aec65edd007&email=example@example.com">Visit W3Schools</a>
                        <br>

                        <label for="defaultFormContactEmailEx" class="grey-text">Password</label>
                        <input type="password" id="inputPassword" class="form-control">

                        <br>
                         
                        <label for="defaultFormContactEmailEx" class="grey-text">Repetir Password</label>
                        <input type="password" id="repeatPassword" class="form-control" onkeyup="autoValidator(); return false;">
                        <span id="confirmMessage" class="confirmMessage"></span>
                        <br>

                        <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkbox">
                        <label class="form-check-label" for="checkbox">Confirmo que me quero registar na Área de Cliente</label>
                        </div>

                        <br>
                        <input type="hidden" id="idCrm">
                        <input type="hidden" id="emailCrm">
                        <div class="text-center mt-4">
                        <button class="btn btn-outline-warning" type ="submit">Registar<i class="fa fa-paper-plane-o ml-2"></i></button>
                        </div>  
                       
                        <br>                                  
                    <!-- Default form contact -->      
                </div>
            </form>
            </section>
            <!--Section: Cards-->
        </div>
        </body>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    var resgisterButton = document.getElementById('registerForm');
    function register() {
        event.preventDefault();
        console.log("teste")
        //store de variaveis
        var name = document.getElementById('inputName');
        var password = document.getElementById('inputPassword');
        var pass2 = document.getElementById('repeatPassword');
        var checkBox = document.getElementById('checkbox');
        var idCrm = document.getElementById('idCrm');
        var emailCrm = document.getElementById('emailCrm');
               
        if(validator()){
            if(checkbox.checked){
              /* $.ajax({
                 type: "POST",
                 headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                data:{
                    _token : $('meta[name="csrf-token"]').attr('content'),
                    name : name,
                    password: password,
                    idCrm: idCrm,
                    emailCrm: emailCrm
                }
                dataType: "text",
                success: function(resultData) { alert("Save Complete") }
               });
               */
            }else{
                alert("Tem de concordar com o resgistro");
                return;
            }
            console.log("São iguais");
        }else{
            console.log("false");
        }
      
    });
   
    
    function validator(){
        //Guarda as passwords inseridas
      var pass1 = document.getElementById('inputPassword');
      var pass2 = document.getElementById('repeatPassword'); 
      //compara as 2 passowrds 
      //se for verdadeiro devolve true
      //se for falso devolve false
      if(pass1.value == pass2.value){
          return true;
        }else{
          return false;
        }  
    }
    function autoValidator(){
     //Guarda as passwords inseridas
     var pass1 = document.getElementById('inputPassword');
     var pass2 = document.getElementById('repeatPassword');
    
     //guarda a mensagem de validacao
     var message = document.getElementById('confirmMessage');
  
     //as cores de verdadeiro ou falso
     var goodColor = "#66cc66";
     var badColor = "#ff6666";
  
     //comparacao dos 2 valores
     //e a confirmação message
     if(pass1.value == pass2.value){
        //A password dá match
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
     }else{
        //Passwords diferentes
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
     }
    }
    </script>
 