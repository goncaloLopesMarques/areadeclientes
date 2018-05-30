
<script>
  function fillHiddenInputs(){
    $("#modalPush").modal();
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

     window.onload = fillHiddenInputs;
</script>




@extends('app')



@section('head')

    @include('layout.head')
    
@endsection




@section('nav-bar')

    @include('layout.nav-bar')
    
@endsection




@section('main')

    @include('layout.register')
    
@endsection



@section('footer')

    @include('layout.footer')

@endsection



@section('scripts-css')

    @include('layout.scripts-css')
    
@endsection


@section('modals')

    @include('layout.modals')
    
@endsection
