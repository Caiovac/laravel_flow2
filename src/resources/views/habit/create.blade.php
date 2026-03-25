<x-layout>
    <main class="py-10">
        <h1 class="text-4xl font-bold text-center">Registra una nuova abitudine</h1>
        <section class="bg-white  max-w-[600px] mx-auto p-10 border-2 mt-4">
            <form action="{{ route('habits.store') }}" method="POST" class="max-w-md mx-auto">
                @csrf
                <div class="flex flex-col gap-2 mb-2">
                    <label for="name" class="font-bold">Nome della abitudine</label>
                    <input 
                    type="text"
                    name="name" 
                    placeholder="es. leggere 10 pagine"
                    class="bg-white p-2 border-2" @error('name') border-red-500 @enderror>
                </div>
    
                <button type="submit" class="mt-4 bg-white p-2 border-2 font-bold">
                    Registra abitudine
                </button>
            </form>
        </section>
    </main>
</x-layout>