{{-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Welcome!</h1>

  </body>
</html> --}}

@component('mail::message')
Hello **{{$user->last_name .", " . $user->first_name }}**,  {{-- use double space for line break --}}
Thanks for you registration!

{{-- Click below to write your first dream!
@component('mail::button', ['url' => $link])
Go to your inbox
@endcomponent --}}
Sincerely,
MyDailyDreams team.
@endcomponent
