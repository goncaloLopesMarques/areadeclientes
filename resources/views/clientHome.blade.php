@extends('layouts.app')
@section('content')
<?php use App\Http\Controllers\clientController;?>
<body>
    <main class="mt-5 pt-5">
        <div class="container">

            <!--Section: Cards-->
                <!--Grid row-->
                <div class="row wow fadeIn">
                    <form id="dados-do-cliente">
                        <p class="h4 text-center mb-4">Os seus dados guardados no nosso Crm</p>

                        <label for="nome" class="grey-text">Nome</label>
                        <input type="text" id="nome" class="form-control">
                        
                        <br>

                        <label for="apelido" class="grey-text">Apelido</label>
                        <input type="text" id="apelido" class="form-control">
                        
                        <br>

                        <label for="email" class="grey-text">Email</label>
                        <input type="email" id="email" class="form-control">

                        <br>

                        <label for="telemovel" class="grey-text">Telemóvel</label>
                        <input type="text" id="telemovel" class="form-control">

                        <br>
                        
                        <!-- Default textarea message -->
                        <label for="telemovelDeTrabalho" class="grey-text">Telemóvel de Trabalho</label>
                        <input type="text" id="telemovelDeTrabalho" class="form-control"></input>

                        <br>

                        
                        <label for="morada" class="grey-text">Morada</label>
                        <input type="text" id="morada" class="form-control">

                        <br>

                        <div class="text-center mt-4">
                            <button class="btn btn-mdb-color waves-effect waves-light" type="submit">Alterar<i class="fa fa-paper-plane-o ml-2"></i></button>
                            <button class="btn btn-mdb-color waves-effect waves-light" type="submit">Remover<i class="fa fa-paper-plane-o ml-2"></i></button>
                            <button class="btn btn-mdb-color waves-effect waves-light" onclick="pedirExclusao();" >Pedir Exclusão<i class="fa fa-paper-plane-o ml-2"></i></button>
                        </div>
                    </form>
                    <!-- Default form contact -->

                </div>
                <!--Grid row-->

                <hr class="mb-5">
        </div>
    </main>
</body>
@endsection
<script>
/*
function pedirExclusao(){
    event.preventDefault();
    {{clientController::pedirExclusao()}}
}
*/

  window.onload = function() {
       //obter os inputs
       var inputArray = new Array();
        inputArray.push(document.getElementById("nome"));
        inputArray.push(document.getElementById("apelido"));
        inputArray.push(document.getElementById("telemovel"));
        inputArray.push(document.getElementById("telemovelDeTrabalho"));
        inputArray.push(document.getElementById("email"));
        inputArray.push(document.getElementById("morada"));
      


       // vai buscar a info do array php para um array javascript
    var dataArray = new Array();
    <?php foreach($result as $key => $val){ ?>
        dataArray.push('<?php echo $val; ?>');
    <?php } ?>
   
     //preenche os inputs com as variaveis
     for (var i = 0, len = inputArray.length; i < len; i++) {
     
      inputArray[i].value = dataArray[i];
    
    }
   }
   
</script>




