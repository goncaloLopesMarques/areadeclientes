<?php use App\Http\Controllers\clientController;?>
<div class="container">
   <!--Section: Jumbotron-->
   <section class="card wow fadeIn" id="intro" style="visibility: visible; animation-name: fadeIn;">
      <!-- Content -->
      <div class="card-body text-white text-center py-5 px-5 my-5">
         @if(session('semDados'))
         <div class="col-md-12 alert alert-danger" data-dismiss="alert" aria-label="close">
            {{session('semDados')}}
         </div>
         @endif
         <h1 class="mb-4">
            <strong>Área de Cliente</strong>
         </h1>
         <p class="mb-4">Tenha controlo sobre todos os seus dados</p>
         <p>
            @if(session('response'))
         <div class="col-md-12 alert alert-success" data-dismiss="alert" aria-label="close">
            {{session('response')}}
         </div>
         @endif
         </p>


         <div class="row">
            <div class="text-center col-md-8 offset-2">
               <a target="_self" href="{{ url('/login') }}" class="col-md-6 btn btn-primary waves-effect waves-light">Login</a>
               <a href="{{ url('/pesquisar') }}" class="col-md-6 btn btn-primary waves-effect waves-light">É nosso cliente?</a>
            </div>
         </div>

         <div class="row">
            <div class="text-center col-md-8 offset-2">
               
               <a href="#direitos" class="col-md-6 btn btn-primary waves-effect waves-light">OS seus direitos</a>
            </div>
         <div>





      </div>
      <!-- Content -->
   </section>
   <!--Section: Jumbotron-->
   <!--Section: Cards-->
   <section id="direitos" class="pt-5">
      <!-- Heading & Description -->
      <div class="wow fadeIn my-5" style="visibility: visible; animation-name: fadeIn;">
         <!--Section heading-->
         

         <blockquote class="blockquote bq-primary">
             <p class="bq-title">A nossa área de cliente permite lhe gerir os seus dados pessoais</p>
             <p>As empresas guardam os seus dados pessoais quando interage ao navegar no seu website ou quando entra em contacto.</p>
             <hr>
             <p>De forma a poder exercer os seus direitos conforme o novo regulamento de proteção de dados tem ao seu dispor as seguintes funcionalidades.</p>
         </blockquote>



        <!--  <h2 class="h1 text-center mb-5" style="font-size: 1.5rem;">A nossa área de cliente permite lhe gerir os seus dados pessoais</h2>

         <hr>

         <h3 class="h1 text-center mb-5" style="font-size: 1.1rem;">As empresas guardam os seus dados pessoais quando interage ao navegar no seu website ou quando entra em contacto.</h3>

         <p>De forma a poder exercer os seus direitos conforme o novo regulamento de proteção de dados tem ao seu dispor as seguintes funcionalidades.</p> -->

         <br>

         <div class="row display-flex">
            <a class="pintor_link  col-sm-6 col-xs-12 categorias-grid" data-target="#modalPedirOrcamento" data-toggle="modal">
             <!--   <div class="row"> -->
                  <div class="col-xs-4">
                     {{-- <img src="img/icons/pintor.png" class="center inverse" alt="eletricista" height="75" width="75"> --}}
                  </div>
                  <div class="col-xs-8">
                     <h3 class="center text-white grid">CONSULTA</h3>

                     <hr style="border-top: 2px solid rgba(0, 0, 0, 0.25);">

                     <p class="center text-white grid">Consultar a informação pessoal que temos guardada sobre si.</p>

                  </div>
              <!--  </div> -->
            </a>
            <a class="canalizador_link col-sm-6 col-xs-12 categorias-grid" data-target="#modalPedirOrcamento" data-toggle="modal">
               <!-- <div class="row"> -->
                  <div class="col-xs-4">
                     {{-- <img src="img/icons/pipe-losing-water.png" class="center inverse" alt="eletricista" height="75" width="75"> --}}
                  </div>
                  <div class="col-xs-8">
                     <h3 class="center text-white grid">ESQUECIMENTO</h3>

                     <hr style="border-top: 2px solid rgba(0, 0, 0, 0.25);">

                     <p class="center text-white grid">Eliminar definitivamente todos os dados. Não receberá mais comunicações.</p>
                  </div>
               <!-- </div> -->
            </a>
            <a class="eletricista_link col-sm-6 col-xs-12 categorias-grid" data-target="#modalPedirOrcamento" data-toggle="modal">
               <!-- <div class="row"> -->
                  <div class="col-xs-4">
                     {{-- <img src="img/icons/eletricista.png" class="center inverse" alt="eletricista" height="75" width="75"> --}}
                  </div>
                  <div class="col-xs-8">
                     <h3 class="center text-white grid">PORTABILIDADE</h3>

                     <hr style="border-top: 2px solid rgba(0, 0, 0, 0.25);">

                     <p class="center text-white grid">Consultar a informação pessoal que temos guardada sobre si.</p>
                  </div>
              <!--  </div> -->
            </a>
            <a class="pedreiro_link col-sm-6 col-xs-12 categorias-grid" data-target="#modalPedirOrcamento" data-toggle="modal">
              <!--  <div class="row"> -->
                  <div class="col-xs-4">
                     {{--  <img src="img/icons/pedreiro.png" class="center inverse" alt="eletricista" height="75" width="75"> --}}
                  </div>
                  <div class="col-xs-8">
                     <h3 class="center text-white grid">OPOSIÇÃO</h3>

                     <hr style="border-top: 2px solid rgba(0, 0, 0, 0.25);">

                     <p class="center text-white grid">Não voltará a ser contactado, deixa de receber as nossas comunicações.</p>
                  </div>
              <!--  </div> -->
            </a>
         </div>
         <!--Section description-->
         <br><br>
         <div class="row">
            <div class="col-md-6">
               <p>O RGPD (Regulamentação Geral para Protecção de Dados Pessoais) trouxe várias variaveis novas no que diz respeito
            aos direitos dos utilizadores. Entre eles destacamos <strong>Consulta</strong>, <strong>Edição</strong>, <strong>Exclusão</strong> e <strong>Remoção</strong> dos dados.</p>
            </div>
         <hr>
         <div class="col-md-6">
         A nossa Área de cliente permite aos utilizadores exercerem todos os seus direitos. Queremos que os nossos clientes tenham controlo total sobre os seus dados e que saibam
         o que fazemos com eles, permitimos tambem que posos pedir para ser excluido ou removido sem burocracias.</p>
      </div>
      </div>
      </div>
      <!-- Heading & Description -->
    
   </section>
   <!--Section: Cards-->
</div>
<!-- Modal de search -->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <form action="{{ url('pesquisar') }}" method="POST">
            <div class="modal-header text-center">
               <h4 class="modal-title w-100 font-weight-bold">É nosso cliente?</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body mx-3">
               <div class="md-form mb-5">
                  <i class="fa fa-envelope prefix grey-text"></i>
                  <input type="email" id="defaultForm-email" class="form-control validate">
                  <label data-error="wrong" data-success="right" for="defaultForm-email">O seu email</label>
               </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
               <button class="btn btn-default fa fa-search" type="submit">&nbsp;&nbsp;Procurar</button>
            </div>
         </form>
      </div>
   </div>
</div>