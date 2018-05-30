                @if(session()->has('Success'))
                  <div class="col-md-12 alert alert-success" data-dismiss="alert" aria-label="close"  style="-webkit-appearance: none;">
                     {{ session()->get('message') }}
                  </div>
                  @endif
                  @if(session('Error'))
                  <div class="col-md-12 alert alert-danger" style="-webkit-appearance: none;">
                     {{session('response')}}
                  </div>
                  @endif
<div class="container">
    <div class="row">
    <div class="col-md-6 offset-3">
        <form class="col-md-12" action="{{ url('/pesquisar') }}" method="post" style="
    width: 100%;">
    <input type="hidden" name="_token" value="Udix8UuD3rrDYghQzRnkaubEhDRuRKV4N2C50mbt">
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
<!-- Material form subscription -->

</div>
</div>