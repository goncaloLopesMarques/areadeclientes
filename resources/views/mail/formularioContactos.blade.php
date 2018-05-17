@component('mail::message')
# Introduction





Nome:
{{ $dadosFormulario->name }}
<br>

Assunto:
{{ $dadosFormulario->subject }}
<br>

Mensagem:
{{ $dadosFormulario->email }}




The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
