<main class="mt-5 pt-5">
        <div class="container">    
            <!--Section: Jumbotron-->
            <section class="card wow fadeIn" id="intro" style="visibility: visible; animation-name: fadeIn;">

                <!-- Content -->
                <div class="card-body text-white text-center py-5 px-5 my-5">
                     @if(session('response'))
                      <div class="col-md-8 alert alert-success" data-dismiss="alert" aria-label="close">
                     {{session('response')}}
                      </div>
                     @endif
                    <h1 class="mb-4">
                        <strong>Área de Cliente</strong>
                    </h1>
                    <p class="mb-4">
                        <strong>Tenha controlo sobre todos os seus dados</strong>
                    </p>
                    <a target="_self" href="{{ url('/login') }}" class="btn btn-outline-white btn-lg waves-effect waves-light">Login
                    </a>

                </div>
                <!-- Content -->
            </section>
            <!--Section: Jumbotron-->

            <!--Section: Cards-->
            <section class="pt-5">

                <!-- Heading & Description -->
                <div class="wow fadeIn my-5" style="visibility: visible; animation-name: fadeIn;">
                    <!--Section heading-->
                    <h2 class="h1 text-center mb-5">O que é a nossa Área de cliente?</h2>
                    <!--Section description-->
                    <p class="text-center">O RGPD (Regulamentação Geral para Protecção de Dados Pessoais) trouxe várias variaveis novas no que diz respeito
                    aos direitos dos utilizadores. Entre eles destacamos <strong>Consulta</strong>, <strong>Edição</strong>, <strong>Exclusão</strong> e <strong>Remoção</strong> dos dados.<hr>
                    A nossa Área de cliente permite aos utilizadores exercerem todos os seus direitos. Queremos que os nossos clientes tenham controlo total sobre os seus dados e que saibam
                    o que fazemos com eles, permitimos tambem que posos pedir para ser excluido ou removido sem burocracias.</p>
                </div>
                <!-- Heading & Description -->
                <hr class="mb-5">

            </section>
            <!--Section: Cards-->

        </div>
    </main>