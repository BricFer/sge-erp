<nav class="flex flex-row justify-between items-center w-full my-6">
    
    <div class="flex flex-row justify-between items-center gap-4">
        <a href="{{ $backUrl ?? route('home') }}">
            <img class="block" src="{{ asset('assets/icons/left-icon.svg') }}" alt="left icon">
        </a>
        <a href="#">Clientes</a>
        <a href="#">Facturas</a>
        <a href="#">Productos</a>
        <a href="#">Informes</a>
    </div>
    
    <div class="flex flex-row justify-between items-center gap-2">
        <p href="#">Briceida</p>
        <a href="#">
            <img class="block" src="{{ asset('assets/icons/sms-icon.svg') }}" alt="message icon">
        </a>
        <a href="">
            <img class="block" src="{{ asset('assets/icons/exit-icon.svg') }}" alt="exit icon">
        </a>
    </div>
</nav>