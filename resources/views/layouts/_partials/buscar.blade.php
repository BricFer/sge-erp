<div>
    <div class="md:flex md:flex-row md:justify-between md:items-center w-full my-6">
        
        <div class="flex flex-row gap-2 items-center my-4">
            <a class="block border-2 border-black/30" href="{{ $addUrl ?? route('home') }}">
                <img class="block w-[32px]" src="{{ asset('assets/icons/add-icon.svg') }}" alt="Add icon">
            </a>
            <a class="block border-2 border-black/30 md:my-0" href="#">
                <img class="block w-[32px]" src="{{ asset('assets/icons/upload-icon.svg') }}" alt="upload icon">
            </a>
        </div>
    
        <div class="flex flex-row gap-2 items-center border-2 w-full h-8 p-1 my-4  md:w-[728px]">
            <img
                class="block"
                src="{{ asset('assets/icons/search-icon.svg') }}"
                alt="search icon"
            />
            <input
                wire:model.live="buscar"
                type="text"
                placeholder="Buscar . . ."
                class="border-none p-0 w-full placeholder:italic"
            />
        </div>
    
        
        <div class="flex flex-row gap-8 justify-between items-center">
            
            <div class="flex flex-row gap-2 justify-between items-center">
                <a class="block border-2 border-black/30" href="#">
                    <img class="block w-[32px]" src="{{ asset('assets/icons/char-icon.svg') }}" alt="char icon">
                </a>
                <a class="block border-2 border-black/30" href="{{ $listUrl ?? route('home') }}">
                    <img class="block w-[32px]" src="{{ asset('assets/icons/list-icon.svg') }}" alt="list icon">
                </a>
                <a class="block border-2 border-black/30" href="{{ $gridUrl ?? route('home') }}">
                    <img class="block w-[32px]" src="{{ asset('assets/icons/grid-icon.svg') }}" alt="char icon">
                </a>
            </div>
        </div>
    </div>
</div>