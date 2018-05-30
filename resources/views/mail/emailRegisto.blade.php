@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset('/img/logo.png') }}">
        @endcomponent
    @endslot

{{-- Body --}}
            <h1>Teste</h1>  
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