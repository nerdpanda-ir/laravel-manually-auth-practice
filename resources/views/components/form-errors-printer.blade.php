@if($errors->any())
<ul style="background-color: lightcoral; color: darkred">
    @foreach($errors->all() as $errorItem)
    <li>{{$errorItem}}</li>
    @endforeach
</ul>
@endif
