{{-- Cuando el atributo "role" se aplica a un elemento HTML, como un <div>, le indica al lector de pantalla que ese contenido es importante y debe anunciarse inmediatamente al usuario, sin necesidad de que este enfoque el elemento. --}}

@if ($message = Session::get('success'))
    <div id="success-message" role="alert" class="absolute bg-green-600 inset-x-0 top-0 p-4 text-white text-center">
        <p>{{$message}}</p>
    </div>
@endif

@if ($message = Session::get('danger'))
    <div id="danger-message" role="alert" class="absolute bg-red-600 inset-x-0 top-0 p-4 text-white text-center">
        <p>{{$message}}</p>
    </div>
@endif

@if ($message = Session::get('denied'))
    <div id="denied-message" role="alert" class="absolute bg-red-600 inset-x-0 top-0 p-4 text-white text-center">
        <p>{{$message}}</p>
    </div>
@endif

@if($message = Session::get('error-db'))
    <div id="error-db-message" role="alert" class="absolute bg-red-600 inset-x-0 top-0 p-4 text-white text-center">
        <p>{{$message}}</p>
    </div>
@endif

@if ($errors->any())
    <div id="validation-errors" role="alert" class="bg-[rgba(163, 29, 29, 0.35)] border-l-4 border-red-500 text-[#A31D1D] px-8 my-8 xl:max-w-7xl xl:m-auto">

        <div class="flex items-center gap-2">
            <img
                src="{{ asset('assets/icons/warning-icon.svg') }}"
                alt="warning icon"
                class="block"
            >
            <p class="font-bold">Se encontraron {{ $errors->count() }} error(es) al intentar crear el cliente:</p>
        </div>

        <ul class="list-disc list-inside p-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', () => {
        ['success-message', 'danger-message', 'denied-message', 'error-db-message'].forEach( id => {

            const elem = document.getElementById(id);

            if( elem ) {

                setTimeout( () => {
                    elem.remove()
                }, 3000);
            }
        });
    });
</script>