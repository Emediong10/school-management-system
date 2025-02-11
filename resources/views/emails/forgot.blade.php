@component('mail::message ')
Hello {{ $user->name }}

<p>We understands that this happens</p>

@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
Reset Your Password

@endcomponent

<P>In case you have any issues recovering you password, please contact us</P>

Thanks,<br>
{{ config('app.name') }}
@endcomponent


