
@extends('layouts.app')
@section('content')
<?php use App\Http\Controllers\clientController;?>
<body>

<!-- REMOVER ESTE FICHEIRO (foi substituido) -->


    <main class="mt-5 pt-5">
        <div class="container">

            <!--Section: Cards-->
                <!--Grid row-->
                <div id = "excluidoError">
                
                </div>

                <div class="row wow fadeIn">
                
                    @if ($errors->any())
                     
                     <div class="alert alert-danger">
                      <ul>
                       @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                     </ul>
                     </div>

                    @endif

                    <form id="dados-do-cliente" action="{{ url('/clientHome/AlterarDados') }}" method="post">
                    {{ csrf_field() }}
                        <p class="h4 text-center mb-4">Os seus dados guardados no nosso Crm</p>

                        <label for="nome" class="grey-text">Nome</label>
                        <input type="text" id="nome" class="form-control" name="nome">
                        
                        <br>

                        <label for="apelido" class="grey-text">Apelido</label>
                        <input type="text" id="apelido" class="form-control" name ="apelido">
                        
                        <br>

                        <label for="email" class="grey-text">Email</label>
                        <input type="email" id="email" class="form-control" name="email">

                        <br>

                        <label for="telemovel" class="grey-text">Telemóvel</label>
                        <input type="text" id="telemovel" class="form-control" name ="telemovel">

                        <br>
                        
                        <!-- Default textarea message -->
                        <label for="telemovelDeTrabalho" class="grey-text">Telemóvel de Trabalho</label>
                        <input type="text" id="telemovelDeTrabalho" class="form-control" name ="telemovelDeTrabalho">

                        <br>

                        
                        <label for="morada" class="grey-text">Morada</label>
                        <input type="text" id="morada" class="form-control" name ="morada">

                        <br>

                        <div class="text-center mt-4">
                            <button class="btn btn-mdb-color waves-effect waves-light" type="submit">Alterar<i class="fa fa-paper-plane-o ml-2"></i></button>
                            <a href="{{action('clientController@Remocao')}}"style="color: #cc0000">Remover-me!</a>
                            <a href="{{action('clientController@Exclusao')}}"style="color: #cc0000">Quero ser excluido!</a>
               
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

 function fillInputs() {
        //obter os inputs
        var pediuExclusao = document.getElementById("pediuExclusao");
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
        //Variavel que tem o optin--- 0 se esta optin, 1 se está optOut
        var optIn = dataArray[dataArray-1];
     //preenche os inputs com as variaveis
     for (var i = 0, len = inputArray.length; i < len; i++) {
      inputArray[i].value = dataArray[i];
     }

     console.log(dataArray[dataArray.length -1])
     if(dataArray[dataArray.length -1] == 1){
         var html ='<button class="btn btn-danger" disabled="disabled" id="pediuExclusao" >Este contacto pediu exclusão</button>'; 
         document.getElementById("excluidoError").innerHTML = html;
     }
     if(dataArray[dataArray.length -2] == 1){
        console.log("pediu remocao")
     }
   }
   window.onload = fillInputs;
</script>





