<?php use App\Http\Controllers\clientController;?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin: 0 auto">
            <div class="panel panel-default">


            <h3 class="my-3 h3 text-center">Os seus dados</h3>
            
            <div class="panel-body">
                <div id ="excluidoError">
                
                </div>

                
                @if ($errors->any())
                     
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif

                    <form id="dados-do-cliente" class="form-horizontal" action="{{ url('/clientHome/AlterarDados') }}" method="post">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="nome" class="grey-text">Nome</label>
                            <div class="col-md-12">
                                <input type="text" id="nome" class="form-control" name="nome">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="apelido" class="grey-text">Apelido</label>
                            <div class="col-md-12">
                                <input type="text" id="apelido" class="form-control" name ="apelido">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="grey-text">Email</label>
                            <div class="col-md-12">
                                <input type="email" id="email" class="form-control" name="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="telemovel" class="grey-text">Telemóvel</label>
                            <div class="col-md-12">
                                <input type="text" id="telemovel" class="form-control" name ="telemovel">
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label for="telemovelDeTrabalho" class="grey-text">Telemóvel de Trabalho</label>
                            <div class="col-md-12">
                                <input type="text" id="telemovelDeTrabalho" class="form-control" name ="telemovelDeTrabalho">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="morada" class="grey-text">Morada</label>
                            <div class="col-md-12">
                                <input type="text" id="morada" class="form-control" name ="morada">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-mdb-color waves-effect waves-light" type="submit">Alterar<i class="fa fa-paper-plane-o ml-2"></i></button>
                                
                                <a class="btn btn-link" href="{{action('clientController@Remocao')}}" style="color: #cc0000">Remover-me!</a>
                                
                                <a class="btn btn-link" href="{{action('clientController@Exclusao')}}"style="color: #cc0000">Quero ser excluido!</a>
                   
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

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