@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset('minimal-digi-logo') }}">
        @endcomponent
    @endslot

{{-- Body --}}
<a href="http://127.0.0.1/gitProjects/areadeclientes/public/register?id={{ $dados["id"] }}&email={{ $dados["email"] }}" > Digitalinput Área de Cliente </a>
            {{ $dados["email"] }} 
            {{ $dados["id"] }} 
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