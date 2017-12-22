@component('mail::message')
# Introduction

The body of your message.

-one
-two
-three

Yuhu more members!

@component('mail::button', ['url' => 'http://localhost:8000/posts'])
Posts!
@endcomponent

@component('mail::panel', ['url' => ''])
Lorem ipsum dolar sit amet.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
