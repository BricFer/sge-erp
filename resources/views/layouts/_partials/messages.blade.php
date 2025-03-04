@if ($message = Session::get('success'))
    <div class="animate-fade-message" style="padding:15px; background-color:green; color:white">
        <p>{{$message}}</p>
    </div>
@endif

@if ($message = Session::get('danger'))
    <div class="animate-fade-message" style="padding:15px; background-color:red; color:white">
        <p>{{$message}}</p>
    </div>
@endif