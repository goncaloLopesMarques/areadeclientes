@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset('minimal-digi-logo.png') }}" style="max-width:200px!important;">
        @endcomponent
    @endslot

{{-- Body --}}
    Muito Obrigado por utilizar os nossos serviços.
    <p></p>
   No seguimento do novo regulamento de protecção de dados estamos a permitir aos nossos clientes 
o controlo total sobre os seus dados(consulta, edição, exclusão e remoção) e para isso criámos a nossa área de cliente.
<p>
   Para efectuar estas operações sobre os dados só precisa de aceder à nossa área de cliente efectuar o
seu registo com um nome de utilizador e uma palavra passe à sua escolha, realizar o login e está pronto
para gerir os seus dados!
<p></p>


@component('mail::button', ['url' => $dados['url']])
Área de Cliente
@endcomponent

{{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

{{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} Digitalinput
        @endcomponent
    @endslot
@endcomponent