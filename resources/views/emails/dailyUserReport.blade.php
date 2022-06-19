@component('mail::message')


@foreach($users as $user)
    {{$user->email}}

@endforeach
Thanks,<br>
{{ config('app.name') }}
@endcomponent
