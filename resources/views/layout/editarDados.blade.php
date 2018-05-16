<?php use App\Http\Controllers\clientController;?>

<main class="mt-5 pt-5">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin: 0 auto">
            <div class="panel panel-default" id= "editarDados">


             <h3 class="my-3 h3 text-center"> Os seus dados</h3>
            
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
                            <label for="email" class="grey-text">Email</label> &nbsp;<i id="questionToolTip" class="fa fa-question-circle fa-lg" aria-hidden="true"></i> 
                            <div class="col-md-12">
                                <input type="email" id="email" class="form-control" name="email" disabled>
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
                                <a class="btn btn-link"  style="color: #cc0000"data-toggle="modal"data-target="#remocaoModal">Remover-me!</a>
                                <a class="btn btn-link"  style="color: #cc0000"data-toggle="modal"data-target="#exclusaoModal">Quero ser excluido!</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- esta div só mostra quando o utilizador foi removido -->
            <div id ="removido" style="display:none">
              <h1>Este utilizador foi removido da nossa base de dados, não temos dados sobre si</h1>
            </div>
        </div>
    </div>
</div>
<!-- Modal da exclusão -->
<div class="modal fade" id="exclusaoModal" tabindex="-1" role="dialog" aria-labelledby="exclusaoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Exlusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Ao pedir exclusão não voltará a ser contactado por nós, tem a certeza que pretende continuar?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                <a class="btn btn-link" href="{{action('clientController@Exclusao')}}"style="color: #cc0000">Continuar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal da Remoção -->
<div class="modal fade" id="remocaoModal" tabindex="-1" role="dialog" aria-labelledby="remocaoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Exlusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Ao pedir remoção toda a informação que temos sobre si será apagada, tem a certeza que pretende continuar?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                <a class="btn btn-link" href="{{action('clientController@Remocao')}}" style="color: #cc0000">Continuar</button>
            </div>
        </div>
    </div>
</div>
</main>

<script>

 function fillInputs() {
        //obter os inputs
        var divAutenticado = document.getElementById("editarDados");
        var divRemovido = document.getElementById("removido");
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
        divAutenticado.style.display= "none";
        divRemovido.style.display="block";
     }else{

     }
   }
   window.onload = fillInputs;
</script>