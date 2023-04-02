<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Area</title>
    <link rel="stylesheet" href="{{asset('css/Program.css')}}">
</head>
<body>
@if(session()->has('system.messages.ok'))
    @php($messageItems = session()->get('system.messages.ok'))
    <x-ok-messages-printer :message-items="$messageItems" />
@endif
<nav>
    <x-avatar-printer :avatar="$loggedInUser->avatar" />
    <span id="welcome">
        welcome {{$loggedInUser->name}}
    </span>
    <section id="logoutWrapper">
        <a href="{{route('logout')}}">LogOut</a>
    </section>
</nav>
<h1>
    user area
</h1>
</body>
</html>
