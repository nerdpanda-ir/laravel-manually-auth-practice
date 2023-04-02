@if(session()->has('system.messages.ok'))
    @php
        $messages = session()->get('system.messages.ok');
    @endphp
    <x-ok-messages-printer :message-items="$messages"/>
@endif

@if(session()->has('system.messages.fail'))
    @php
        $messages = session()->get('system.messages.fail');
    @endphp
    <x-fail-messages-printer :message-items="$messages"/>
@endif

