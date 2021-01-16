@component('mail::message')
{{ $subject }}

Nytt mail från {{ $email }}!
<br/>
Telefonnummer {{ $phone }}

{{ $description }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

{{ config('app.name') }}
@endcomponent
