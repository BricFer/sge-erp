@if ($message = Session::get('success'))
    <div id="success-message" class="absolute bg-green-600 inset-x-0 top-0 p-4 text-white text-center">
        <p>{{$message}}</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            setTimeout( () => {
                let successMessage = document.getElementById('success-message');

                if( successMessage ) {
                    
                    successMessage.remove();
                }
            }, 3000);
        })
    </script>
@endif

@if ($message = Session::get('danger'))
    <div id="danger-message" class="absolute bg-red-600 inset-x-0 top-0 p-4 text-white text-center">
        <p>{{$message}}</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            setTimeout( () => {
                let dangerMessage = document.getElementById('danger-message');

                if( dangerMessage ) {
                    
                    dangerMessage.remove();
                }
            }, 3000);
        })
    </script>
@endif

@if ($message = Session::get('denied'))
    <div id="denied-message" class="absolute bg-red-600 inset-x-0 top-0 p-4 text-white text-center">
        <p>{{$message}}</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            setTimeout( () => {
                let deniedMessage = document.getElementById('denied-message');

                if( deniedMessage ) {
                    
                    deniedMessage.remove();
                }
            }, 3000);
        })
    </script>
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