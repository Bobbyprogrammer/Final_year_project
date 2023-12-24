@component('mail::message')
Hello {{$user->name}},

<p>we understand it hapens.</p>
    
@component('mail::button',['url'=>('reset/' .$user->remember_token)])
Reset Your password    
@endcomponent
<p>In Case You have any issue recovering your password,please contact us.</p>
Thanks, <br>
{{config('app.name')}}
@endcomponent