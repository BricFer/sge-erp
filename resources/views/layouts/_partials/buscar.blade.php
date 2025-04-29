<div>
    <div class="md:flex md:flex-row md:justify-between md:items-center w-full my-6">
        
        <div class="flex flex-row gap-2 items-center my-4">
            <a class="block w-[42px] p-1 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal" href="{{ $addUrl ?? route('home') }}">
                <img class="block w-[32px]" src="{{ asset('assets/icons/add-icon.svg') }}" alt="Add icon">
            </a>
            <a class="block w-[42px] p-1 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal md:my-0" href="#">
                <img class="block w-full" src="{{ asset('assets/icons/upload-icon.svg') }}" alt="upload icon">
            </a>
        </div>
    
        <div class="flex flex-row gap-2 items-center w-full p-1 my-4 block h-[42px] p-1 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal md:w-[728px]">
            <img
                class="block"
                src="{{ asset('assets/icons/search-icon.svg') }}"
                alt="search icon"
            />
            <input
                wire:model.live="buscar"
                type="text"
                placeholder="Buscar . . ."
                class="outline-none border-none p-0 w-full placeholder:italic bg-transparent h-[40px]"
            />
        </div>
    
        
        <div class="flex flex-row gap-8 justify-between items-center">
            
            <div class="flex flex-row gap-2 justify-between items-center">
                <a class="block w-[42px] p-1 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal" href="#">
                    <img class="block w-[32px]" src="{{ asset('assets/icons/char-icon.svg') }}" alt="char icon">
                </a>
                <a class="block w-[42px] p-1 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal" href="{{ $listUrl ?? route('home') }}">
                    <img class="block w-[32px]" src="{{ asset('assets/icons/list-icon.svg') }}" alt="list icon">
                </a>
                <a class="block w-[42px] p-1 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal" href="{{ $gridUrl ?? route('home') }}">
                    <img class="block w-[32px]" src="{{ asset('assets/icons/grid-icon.svg') }}" alt="char icon">
                </a>
            </div>
        </div>
    </div>
</div>