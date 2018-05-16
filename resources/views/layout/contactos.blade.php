<main class="mt-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin: 0 auto">
                <div class="panel panel-default">
                    {{-- <div class="panel-heading">Formulário de Registo</div> --}}

                    <h3 class="my-3 h3 text-center">Informações</h3>
                    <hr>
                    <p class="section-description text-center">Tem alguma questão? Contacte-nos, a nossa equipa tratará de o(a) esclarecer.</p>



                    <div class="panel-body">



                            
<section class="section mt-5">

    
   
   

    <div class="row">

        <!--Grid column-->
        <div class="col-md-8 col-xl-9">
            <form id="contact-form" name="contact-form" method="POST" action="{{ url('/enviarEmail') }}">

                {{ csrf_field() }}

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name" class="">Nome</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form">
                            <input type="text" id="email" name="email" class="form-control">
                            <label for="email" class="">Email</label>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form">
                            <input type="text" id="subject" name="subject" class="form-control">
                            <label for="subject" class="">Assunto</label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message">A sua mensagem...</label>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

                <input class="btn btn-primary" type="submit" value="send">

            </form>

            <div class="center-on-small-only">
                <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
            </div>
            <div class="status"></div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 col-xl-3">
            <ul class="contact-icons" style="list-style-type: none;">
                <li><i class="fa fa-map-marker fa-2x"></i>
                    <p>San Francisco, CA 94126, USA</p>
                </li>

                <li><i class="fa fa-phone fa-2x"></i>
                    <p>+ 01 234 567 89</p>
                </li>

                <li><i class="fa fa-envelope fa-2x"></i>
                    <p>contact@mdbootstrap.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>
<!--Section: Contact v.2-->






                    </div>
                </div>
            </div>
        </div>

   




    </div>
</main>