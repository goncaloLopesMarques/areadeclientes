
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin: 0 auto">
            <div class="panel panel-default">
                {{-- <div class="panel-heading">Login</div> --}}

                <h3 class="my-3 h3 text-center">Login</h3>

                <div class="panel-body">
                    
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        @if(session('response'))
                          <div class="col-md-8 alert alert-success">
                            {{session('response')}}
                          </div>
                        @endif

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Nome de Utilizador</label>

                            <div class="col-md-12">
                                <input id="username" class="form-control" name="username" value="{{ old('username') }}">

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

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
                            <div class="col-md-12 col-md-offset-4">
                                <div class="checkbox">
                                    <input type="checkbox" class="form-check-input" id="checkbox100" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="checkbox100">Lembrar-me</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Esqueceu a sua Password?
                                </a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>