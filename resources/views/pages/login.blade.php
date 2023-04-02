<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@if(session()->has('system.messages.fail'))
    @php($messageItems = session()->get('system.messages.fail'))
    <x-fail-messages-printer :message-items="$messageItems"/>
@endif

<x-form-errors-printer />

<form action="{{route('do-login')}}" method="post">
    @csrf
    <section>
        <x-form-error-printer form-name="username"/>
        <label for="username">username:</label>
        <input type="text" name="username" value="{{old('username')}}" id="username">
    </section>

    <section>
        <x-form-error-printer form-name="password"/>
        <label for="password">password:</label>
        <input type="text" name="password" value="{{old('password')}}">
    </section>
    <input type="submit" value="login">
</form>
</body>
</html>
