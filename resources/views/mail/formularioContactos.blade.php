@component('mail::message')
# Introduction






{{ $dadosFormulario->name }}

{{ $dadosFormulario->email }}

{{ $dadosFormulario->subject }}


The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
