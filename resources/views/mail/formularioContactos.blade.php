@component('mail::message')





Nome:
{{ $dadosFormulario->name }}
<br>

Assunto:
{{ $dadosFormulario->subject }}
<br>

Mensagem:
{{ $dadosFormulario->message }}






Thanks,<br>
{{ config('app.name') }}
@endcomponent
