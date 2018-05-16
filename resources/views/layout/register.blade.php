<script src='https://www.google.com/recaptcha/api.js'></script>
<main class="mt-5 pt-5">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin: 0 auto">
            <div class="panel panel-default">
                {{-- <div class="panel-heading">Formulário de Registo</div> --}}

                <h3 class="my-3 h3 text-center">Registo</h3>

                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="{{ url('/registration') }}">

                        {{ csrf_field() }}

                        @if(count($errors)>0)

                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger data-dismiss="alert" aria-label="close"">{{$error}}</div>
                            @endforeach

                        @endif

                        @if(session('response'))

                            <div class="col-md-8 alert alert-danger" data-dismiss="alert" aria-label="close">
                                {{session('response')}}
                            </div>

                        @endif

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-12 control-label">Nome de utilizador</label>

                            <div class="col-md-12">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-12 control-label">Password</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-12 control-label">Confirm Password</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            
                        </div>


                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <input type="checkbox" class="form-check-input" id="checkbox100" name="checked" value="true">
                                     <label class="form-check-label" for="checkbox100">Aceito o registo</label>
                                </div>
                            </div>
                        </div>

                        <div class="g-recaptcha" 
                          data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
                        </div>



                        <input type="hidden" name ="idCrm" id="idCrm">
                        <input type="hidden" name ="emailCrm" id="emailCrm">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-mdb-color waves-effect waves-light">
                                   Registar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>