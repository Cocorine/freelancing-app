
@component('mail::message')


{{ $details['title'] }}

{{-- @component('mail::button', ['url' => $details['url']])
Button Text
@endcomponent --}}

Cordialement!,

{{ config('app.name') }}
@endcomponent
