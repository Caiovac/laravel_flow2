<x-layout>
    <main class="py-10">
                <h1 class="text-3xl font-bold text-center">Benvenuto nella tua dashboard, {{ auth()->user()->name }}</h1>
        <p class="text-center mt-4">Qui puoi vedere le tue abitudini e i tuoi progressi.</p>

     <div>
        <h2>
            Lista di abitudini:
        </h2>
        <ul class="flex flex-col gap-2">
            @forelse ($habits as $item)
                
            <li class="pl-4">
                <div class="flex grap-2 items-center">
                    <p class="font-bold text-xl">
                        - {{ $item->name }}
                    </p>
                    <p>
                        [{{$item->habitLogs()->count()}}]
                    </p>
                </div>
            </li>

            @empty

                <p>
                    Non hai ancora abitudini, inizia ad aggiungerne una!
                </p>
                <a href="/habito/registrazione" class="bg-white p-2 border-2">
                    Aggiungi abitudine
                </a>
                
            @endforelse
        </ul>
     </div>
    </main>
</x-layout>