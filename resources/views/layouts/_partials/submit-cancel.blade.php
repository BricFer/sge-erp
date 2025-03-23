<div class="flex flex-col w-full gap-4 my-6 md:flex-row">
            
    <input
        type="submit"
        value="Confirmar"
        class="border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg cursor-pointer md:w-96 hover:bg-teal-500 hover:border-teal-500"
    />
    
    <a
        href="{{ url()->previous() }}"
        class="block text-center border-2 border-indigo-600 p-2 bg-indigo-600 w-full text-white rounded-lg md:w-96 hover:bg-teal-500 hover:border-teal-500"
    >
        Cancel
    </a>

</div>