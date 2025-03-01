<div>
    <div class="md:flex md:flex-row md:justify-between md:items-center w-full my-6">
        
        <div class="flex flex-row gap-2 items-center my-4">
            <a class="block" href="{{ route('cliente.crear') }}">
                <img class="block w-[32px]" src="{{ asset('assets/icons/add-icon.svg') }}" alt="upload icon">
            </a>
            <a class="block md:my-0" href="#">
                <img class="block w-[32px]" src="{{ asset('assets/icons/upload-icon.svg') }}" alt="upload icon">
            </a>
        </div>
    
        <form method="POST" for="search" class="flex flex-row gap-2 items-center border-2 w-full h-8 p-1 my-4  md:w-[728px]">
            <img
                class="block"
                src="{{ asset('assets/icons/search-icon.svg') }}"
                alt="search icon"
            />
            <input
                type="search"
                name="cliente"
                id="search"
                class="border-none p-0 w-full placeholder:italic"
                placeholder="Buscar . . ."
            />
        </form>
    
        
        <div class="flex flex-row gap-8 justify-between items-center">
            
            <div class="flex flex-row gap-2 justify-between items-center">
                <img class="block" src="{{ asset('assets/icons/left-icon.svg') }}" alt="left icon">
                <p>1-10 /<span class="font-bold"> 37</span></p>
                <img class="block" src="{{ asset('assets/icons/right-icon.svg') }}" alt="right icon">

            </div>

            <div class="flex flex-row gap-2 justify-between items-center">
                <a class="block border-2 border-black" href="#">
                    <img class="block" src="{{ asset('assets/icons/char-icon.svg') }}" alt="char icon">
                </a>
                <a class="block border-2 border-black" href="#">
                    <img class="block" src="{{ asset('assets/icons/list-icon.svg') }}" alt="list icon">
                </a>
                <a class="block border-2 border-black" href="#">
                    <img class="block" src="{{ asset('assets/icons/grid-icon.svg') }}" alt="char icon">
                </a>
            </div>
        </div>
    </div>
</div>