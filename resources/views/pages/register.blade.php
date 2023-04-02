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
<h1>register</h1>
<x-form-errors-printer />
<form action="{{route('do-register')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <x-form-error-printer form-name="name"/>
    <label for="name">name : </label>
    <input name="name" id="name" value="{{old('name')}}">
    <hr>
    <x-form-error-printer form-name="email"/>
    <label for="email">email : </label>
    <input name="email" id="email" value="{{old('email')}}" >

    <hr>
    <x-form-error-printer form-name="username"/>

    <label for="username">username : </label>
    <input name="username" id="username" value="{{old('username')}}">
    <hr>
    <x-form-error-printer form-name="password"/>
    <label for="password">password : </label>
    <input name="password" id="password" value="{{old('password')}}">
    <hr>
    <x-form-error-printer form-name="password_confirmation"/>
    <label for="password_confirmation">password_repeat : </label>
    <input name="password_confirmation" id="password_confirmation" value="{{old('password_repeat')}}">
    <hr>
    <x-form-error-printer form-name="avatar"/>
    <label for="avatar">avatar : </label>
    <input name="avatar" id="avatar" type="file">
    <hr>
    <input type="submit" value="register">
</form>
</body>
</html>
