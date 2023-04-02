@props(['alt'=>null,'avatar'])
@unless(is_null($avatar))
    <img src="{{asset($avatar)}}" alt="{{$alt}}">
@else
    <img src="{{asset("img/default-avatar.png")}}" alt="{{$alt}}">
@endunless
