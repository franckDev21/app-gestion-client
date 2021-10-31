@component('mail::message')
# Bonjour Franck

Votre abonné {{ $data['name'] }} , qui a l'email {{ $data['email'] }} vous écris : <br>

<p>{{ $data['message'] }}</p>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
