@extends('layouts.app')

@section('content')
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
<body onload="fillHiddenInputs();">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Formulário de Registro</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('/registration') }}">
                        {{ csrf_field() }}
                        @if(count($errors)>0)

                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                        @endif

                        @if(session('response'))
                        <div class="col-md-8 alert alert-success">
                            {{session('response')}}
                        </div>
                        @endif
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome de utilizador</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <div class="col-md-6">
                         <input type="checkbox" name="checked" value="true">Aceito o registo<br>
                        </div>
                        </div>

                        <input type="hidden" name ="idCrm" id="idCrm" value="123">
                        <input type="hidden" name ="emailCrm" id="emailCrm" value="123@123.com" >

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
@endsection
