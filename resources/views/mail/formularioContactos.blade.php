@component('mail::message')


Nome:
{{ $dadosFormulario->name }}
<br>

Assunto:
{{ $dadosFormulario->subject }}
<br>

Mensagem:
{{ $dadosFormulario->message }}



Obrigado,<br>
{{ config('app.name') }}
@endcomponent
