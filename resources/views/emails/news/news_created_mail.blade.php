@component('mail::message')
# New Book was created

@component('mail::panel')
    {{ $news->title }}
@endcomponent

@component('mail::button', ['url' => url('/show', $news->id)])
View News
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
