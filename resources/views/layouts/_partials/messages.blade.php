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

@if ($errors->any())
    <div class="bg-[rgba(163, 29, 29, 0.35)] border-l-4 border-red-500 text-[#A31D1D] px-8 my-8 xl:max-w-7xl xl:m-auto">

        <div class="flex items-center gap-2">
            <img
                src="{{ asset('assets/icons/warning-icon.svg') }}"
                alt="warning icon"
                class="block"
            >
            <p class="font-bold">Existen {{ $errors->count() }} al intentar crear el cliente:</p>
        </div>

        <ul class="list-disc list-inside p-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif