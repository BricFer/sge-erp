<nav class="flex flex-row justify-between items-center w-full my-6">
    
    <div class="flex flex-row justify-between items-center gap-8">

        <a href="{{ $backUrl ?? route('home') }}" class="inline-block">
            <img class="block" src="{{ asset('assets/icons/left-icon.svg') }}" alt="left icon">
        </a>
        <a href="{{ route('cliente.home') }}" class="inline-block border-b-solid border-b-2 border-transparent hover:text-indigo-600 hover:border-b-solid hover:border-b-2 hover:border-b-indigo-600/50">Clientes</a>

        <a href="{{ route('proveedor.home') }}" class="inline-block border-b-solid border-b-2 border-transparent hover:text-indigo-600 hover:border-b-solid hover:border-b-2 hover:border-b-indigo-600/50">Proveedores</a>

        <a href="{{ route('empleado.home') }}" class="inline-block border-b-solid border-b-2 border-transparent hover:text-indigo-600 hover:border-b-solid hover:border-b-2 hover:border-b-indigo-600/50">Empleados</a>

        <a href="{{ route('producto.home') }}" class="inline-block border-b-solid border-b-2 border-transparent hover:text-indigo-600 hover:border-b-solid hover:border-b-2 hover:border-b-indigo-600/50">Productos</a>
        
        <a href="{{ route('almacen.home') }}" class="inline-block border-b-solid border-b-2 border-transparent hover:text-indigo-600 hover:border-b-solid hover:border-b-2 hover:border-b-indigo-600/50">Almacenes</a>
    </div>
    
    <div class="flex flex-row justify-between items-center gap-2">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo image" class="block rounded-[50%] w-[48px]">
        </a>
        
        <p>Briceida</p>
        <a href="#">
            <img class="block" src="{{ asset('assets/icons/sms-icon.svg') }}" alt="message icon">
        </a>
        <a href="">
            <img class="block" src="{{ asset('assets/icons/exit-icon.svg') }}" alt="exit icon">
        </a>
    </div>
</nav>