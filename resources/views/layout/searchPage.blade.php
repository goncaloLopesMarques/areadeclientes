@if(session('Message'))
<div class="col-md-12 alert alert-danger" data-dismiss="alert" aria-label="close">
            {{session('Message')}}
@endif
@if(session('Success'))
<div class="container">
   <div class="row">
      <div class="col-md-6 offset-3">
         <!-- Card -->
<div class="card">

<!-- Card image -->
<img class="card-img-top" src="minimal-digi-logo.png" alt="Card image cap">

<!-- Card content -->
<div class="card-body">
<hr>
  <!-- Title -->
  <h4 class="card-title alert alert-success"><a>Já é nosso cliente!</a></h4>
  <!-- Text -->
  <p class="card-text">O seu email encontra-se na nossa base de dados.
                       Se pretender utilizar a sua área de cliente carregue no botão 
                       de registo. </p>
  <!-- Button -->
  <form form id="search-form" method="POST" action="{{ url('/enviarEmailRegisto') }}">
  {{ csrf_field() }}
  <button class="btn btn-default btn-rounded mb-4 waves-effect waves-light" type="submit">Registe-se</a>
  <input type="hidden" name ="email" id="email" value = "{{ session('Success')['data']['email'] }}">
  <input type="hidden" name ="id" id="id" value = "{{ session('Success')['data']['id'] }}">
  </form>
  
</div>
</div>
<!-- Card -->
      </div>
   </div>
</div>
<p>
<p>
@endif

@if(session('Error'))
<div class="container">
   <div class="row">
      <div class="col-md-6 offset-3">
         <!-- Card -->
<div class="card">

<!-- Card image -->
<img class="card-img-top" src="minimal-digi-logo.png" alt="Card image cap">

<!-- Card content -->
<div class="card-body">
<hr>
  <!-- Title -->
  <h4 class="card-title alert alert-danger "><a>O seu email nao consta na nossa base de dados!</a></h4>
  <!-- Text -->
  <p class="card-text">O seu email nao se encontra na nossa base de dados. Se acha que
                       o seu email consta não exite em contactar-nos.</p>
  <!-- Button -->
  <a href="{{url('/contactos')}}" class="btn btn-default btn-rounded mb-4 waves-effect waves-light">Contacte-nos</a>
</div>
</div>
<!-- Card -->
      </div>
   </div>
</div>
<p>
<p>
@endif
<div class="container">
   <div class="row">
      <div class="col-md-6 offset-3">
         <form class="col-md-12" action="{{ url('/pesquisar/pesquisar') }}" method="post" style="idth: 100%;">
            {{ csrf_field() }}
            <p class="h4 text-center mb-4">Já é nosso cliente?</p>
            <div class="md-form">
               <i class="fa fa-envelope prefix grey-text"></i>
               <input type="email" id="email" class="form-control" name="email" required="">
               <label for="materialFormSubscriptionEmailEx">O seu Email</label>
            </div>
            <div class="text-center mt-4">
               <button class="btn btn-default btn-rounded mb-4 waves-effect waves-light" type="submit">Pesquisar<i class="fa fa-paper-plane-o ml-2"></i></button>
            </div>
         </form>
      </div>
   </div>
</div>