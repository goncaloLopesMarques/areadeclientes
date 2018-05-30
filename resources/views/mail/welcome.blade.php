@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset('/img/logo.png') }}">
        @endcomponent
    @endslot

{{-- Body --}}
            <h1>Muito Bem vindo à Área de cliente da CheerUp-TravelGroup</h1>  

       Nesta área de cliente poderá visualizar, alterar, pedir exclusão e remoção dos seus dados. Queremos cumprir
    com o novo regulamento de protecção de dados e dar-lhe o controlo sobre todos os dados fornecidos por si.
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
            © {{ date('Y') }} CheerUp-TravelGroup
        @endcomponent
    @endslot
@endcomponent