<main class="mt-5 pt-5">
   <div class="container">
      <div class="row">
         <div class="col-md-8 col-md-offset-2" style="margin: 0 auto">
            <div class="panel panel-default">
                
                <h3 class="my-3 h3 text-center"> Alterar Password</h3>
               
               <div class="panel-body">
                  @if (session('error'))
                  <div class="alert alert-danger">
                     {{ session('error') }}
                  </div>
                  @endif
                  @if (session('success'))
                  <div class="alert alert-success">
                     {{ session('success') }}
                  </div>
                  @endif
                  <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                     {{ csrf_field() }}
                     <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                        <label for="new-password" class="col-md-12 control-label">Password Actual</label>
                        <div class="col-md-12">
                           <input id="current-password" type="password" class="form-control" name="current-password" required>
                           @if ($errors->has('current-password'))
                           <span class="help-block">
                           <strong>{{ $errors->first('current-password') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                        <label for="new-password" class="col-md-12 control-label">Nova Password</label>
                        <div class="col-md-12">
                           <input id="new-password" type="password" class="form-control" name="new-password" required>
                           @if ($errors->has('new-password'))
                           <span class="help-block">
                           <strong>{{ $errors->first('new-password') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="new-password-confirm" class="col-md-12 control-label">Confirmar Password</label>
                        <div class="col-md-12">
                           <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                           <button type="submit" class="btn btn-primary">
                           Alterar Password
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</main>
