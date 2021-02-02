@component('mail::message')
<h2>{{ $subject }}</h2>

<p class="small">Nytt mail från {{ $email }}!</p>
<p class="lead">Telefonnummer {{ $phone }}</p>

{{ $description }}

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent

{{ config('app.name') }} --}}
@endcomponent
