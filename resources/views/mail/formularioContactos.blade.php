@component('mail::message')


Nome:
{{ $dadosFormulario->name }}
<br>

Assunto:
{{ $dadosFormulario->subject }}
<br>

Mensagem:
{{ $dadosFormulario->message }}




The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
