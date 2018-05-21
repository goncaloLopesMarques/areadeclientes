<?php use App\Http\Controllers\clientController;?>

<main class="mt-5 pt-5">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin: 0 auto">
        <div id="spinner" class="loader" style="display:none">Loading...</div>
            <div class="panel panel-default" id= "editarDados">


             <h3 class="my-3 h3 text-center"> Os seus dados</h3>
            
            <div class="panel-body">
                <div id ="excluidoError">
                
                </div>
                  @if(session()->has('message'))
                    <div class="alert alert-success" data-dismiss="alert" aria-label="close">
                     {{ session()->get('message') }}
                    </div>
                  @endif
                  @if(session('response'))
                      <div class="col-md-8 alert alert-danger">
                     {{session('response')}}
                      </div>
                     @endif
                
                @if ($errors->any())
                     
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif

                    <form id="dadosForm"class="form-horizontal" action="{{ url('/clientHome/AlterarDados') }}" method="post">

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
                            <label for="email" class="grey-text">Email</label> &nbsp;<i type="button" class="fa fa-question-circle-o fa-lg" data-toggle="tooltip" data-placement="right" title="Se pretender alterar o email terá de proceder ao pedido via email."></i> 
                            <div class="col-md-12">
                                <input type="email" id="emailShow" class="form-control" name="emailShow" disabled>
                                <input type="hidden" name ="email" id="email">
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

                                <div class="btn-group" role="group" aria-label="Basic example">

                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Alterar<i class="fa fa-paper-plane-o ml-2"></i></button>
                                     
                                    <span data-toggle="tooltip" data-placement="bottom" title="Todos os seus dados serão eliminados e deixará de receber as nossas comunicações!">
                                        <a class="btn btn-link" style="color: #cc0000"data-toggle="modal"data-target="#remocaoModal">Remover-me&nbsp;<i type="button" class="fa fa-question-circle-o fa-lg"></i></a>
                                    </span>

                                    <span data-toggle="tooltip" data-placement="bottom" title="Deixará de receber as nossas comunicações!">
                                    <a class="btn btn-link"  style="color: #cc0000"data-toggle="modal"data-target="#exclusaoModal">Quero ser excluido&nbsp;<i type="button" class="fa fa-question-circle-o fa-lg"></i></a>
                                    </span>

                                    <span data-toggle="tooltip" data-placement="bottom" title="Exportar os seus dados para excel!">
                                    <a class="btn btn-link"  style="color: #cc0000"data-toggle="modal"data-target="#exportacaoModal">Exportar dados&nbsp;<i type="button" class="fa fa-question-circle-o fa-lg"></i></a>
                                    </span>

                                </div>
                            </div>
                        </div>
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
                <p> Ao pedir exclusão não voltará a ser contactado por nós, tem a certeza que pretende continuar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Voltar</button>
                <a class="btn btn-link" href="{{action('clientController@Exclusao')}}" style="color: #cc0000">Continuar</a>
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
                <p>Ao pedir remoção toda a informação que temos sobre si será apagada, tem a certeza que pretende continuar?</p> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Voltar</button>
                <a class="btn btn-link" href="{{action('clientController@Remocao')}}" style="color: #cc0000">Continuar</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal da Alteração -->
<div class="modal fade" id="alteraoModal" tabindex="-1" role="dialog" aria-labelledby="alteracaoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Exlusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tem a certeza que pretende alterar os seus dados?</p> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                <button class="btn btn-link" type="submit" style="color: #cc0000">Continuar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal de Exportação -->
<div class="modal fade" id="exportacaoModal" tabindex="-1" role="dialog" aria-labelledby="exportacaoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Exportação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tem a certeza que pretende exportar os seus dados?</p> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                <a class="btn btn-link" href="{{ route('export.file',['type'=>'xlsx']) }}" style="color: #cc0000">Exportar</a>
            </div>
        </div>
    </div>
</div>
</form>
</main>
<style>
.loader {
  color: #000066;
  font-size: 90px;
  text-indent: -9999em;
  overflow: hidden;
  width: 1em;
  height: 1em;
  border-radius: 50%;
  margin: 72px auto;
  position: relative;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-animation: load6 1.7s infinite ease, round 1.7s infinite ease;
  animation: load6 1.7s infinite ease, round 1.7s infinite ease;
}
@-webkit-keyframes load6 {
  0% {
    box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
  }
  5%,
  95% {
    box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
  }
  10%,
  59% {
    box-shadow: 0 -0.83em 0 -0.4em, -0.087em -0.825em 0 -0.42em, -0.173em -0.812em 0 -0.44em, -0.256em -0.789em 0 -0.46em, -0.297em -0.775em 0 -0.477em;
  }
  20% {
    box-shadow: 0 -0.83em 0 -0.4em, -0.338em -0.758em 0 -0.42em, -0.555em -0.617em 0 -0.44em, -0.671em -0.488em 0 -0.46em, -0.749em -0.34em 0 -0.477em;
  }
  38% {
    box-shadow: 0 -0.83em 0 -0.4em, -0.377em -0.74em 0 -0.42em, -0.645em -0.522em 0 -0.44em, -0.775em -0.297em 0 -0.46em, -0.82em -0.09em 0 -0.477em;
  }
  100% {
    box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
  }
}
@keyframes load6 {
  0% {
    box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
  }
  5%,
  95% {
    box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
  }
  10%,
  59% {
    box-shadow: 0 -0.83em 0 -0.4em, -0.087em -0.825em 0 -0.42em, -0.173em -0.812em 0 -0.44em, -0.256em -0.789em 0 -0.46em, -0.297em -0.775em 0 -0.477em;
  }
  20% {
    box-shadow: 0 -0.83em 0 -0.4em, -0.338em -0.758em 0 -0.42em, -0.555em -0.617em 0 -0.44em, -0.671em -0.488em 0 -0.46em, -0.749em -0.34em 0 -0.477em;
  }
  38% {
    box-shadow: 0 -0.83em 0 -0.4em, -0.377em -0.74em 0 -0.42em, -0.645em -0.522em 0 -0.44em, -0.775em -0.297em 0 -0.46em, -0.82em -0.09em 0 -0.477em;
  }
  100% {
    box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
  }
}
@-webkit-keyframes round {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes round {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$( "#dadosForm" ).submit(function( event ) {
    $("#editarDados").hide();
  $("#spinner").show();
});
 function fillInputs() {
        //obter os inputs
        var divAutenticado = document.getElementById("editarDados");
        var divRemovido = document.getElementById("removido");
        var inputArray = new Array();
        var emailShow = document.getElementById("email");

        inputArray.push(document.getElementById("nome"));
        inputArray.push(document.getElementById("apelido"));
        inputArray.push(document.getElementById("telemovel"));
        inputArray.push(document.getElementById("telemovelDeTrabalho"));
        inputArray.push(document.getElementById("emailShow"));
        inputArray.push(document.getElementById("morada"));          

        // vai buscar a info do array php para um array javascript
         var dataArray = new Array();
         <?php foreach($result as $key => $val){ ?>
         dataArray.push('<?php echo $val; ?>');
         <?php } ?>
         //Variavel que tem o optin--- 0 se esta optin, 1 se está optOut
         var optIn = dataArray[dataArray-1];
         //preenche os inputs com as variaveis
         emailShow.value = dataArray[4];
         for (var i = 0, len = inputArray.length; i < len; i++) {
         inputArray[i].value = dataArray[i];
         }
         if(dataArray[dataArray.length -1] == 1){
         var html ='<button class="btn btn-danger" disabled="disabled" id="pediuExclusao" >Este contacto pediu exclusão</button>'; 
         document.getElementById("excluidoError").innerHTML = html;
         }
         if(dataArray[dataArray.length -2] == 1){
         divAutenticado.style.display= "none";
         divRemovido.style.display="block";
         }

   }
   window.onload = fillInputs;

</script>