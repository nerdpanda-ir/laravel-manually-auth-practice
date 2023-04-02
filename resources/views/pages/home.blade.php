@php
    /** @var \Illuminate\Database\Eloquent\Collection $recentlyUsers*/
@endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{asset('css/Program.css')}}">
</head>
<body>
@if($userIsLogedIn)
    <nav>
        @php
            $alt = $logedInUser->name . 'alt'
        @endphp
        <x-avatar-printer :avatar="$logedInUser->avatar" :alt="$alt"/>
        <span id="welcome">
        welcome {{$logedInUser->name}}
    </span>
        <section id="logoutWrapper">
            <a href="{{route('user-area')}}">user-area</a>
        </section>
    </nav>
@endif
<h1>Home</h1>
@include('partials.systemMessagePrinter')
@if($recentlyUsers->isNotEmpty())
<section>
    <h4> recently registered users : </h4>
    <h6>ToTal : {{$recentlyUsers->count()}}</h6>
    <ul id="recently-users">
        @foreach($recentlyUsers as $user)
            <li>
                @php($alt = $user->name.' avatar')
                <x-avatar-printer :avatar="$user->avatar" :alt="$alt"/>
                <span> {{ $user->name }}</span>
            </li>
        @endforeach
    </ul>
</section>
@endif

</body>
</html>
