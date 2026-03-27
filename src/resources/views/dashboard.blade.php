<x-layout>
    <main class="py-10">
        <h1 class="text-4xl font-bold text-center">Benvenuto nella tua dashboard, {{ auth()->user()->name }}</h1>

        <a href="{{ route('habits.create') }}" class="p-2 border-2 bg-white font-bold block">
            Registra una nuova abitudine
        </a>

        @session('success')
            <div class="flex">
            <p class="bg-green-100 border-2 border-green-500 text-green-700 p-3 mb-4 max-w-[200px] block">
                {{session('success')}}
            </p>
            </div>
        @endsession


        <div>
            <h2 class="text-xl mt-4">Lista di abitudini:</h2>

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
                        <a href="{{ route('habits.edit', $item->id) }}" class="bg-white text-white p-1 ml-2 hover:opacity-50">
                                <x-icons.pencil />
                        </a>
                        <form action="{{route('habits.destroy', $item)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="bg-red-500 text-white p-1 ml-2 hover:opacity-50">
                                <x-icons.trash />
                            </button>
                        </form>
                    </div>
                </li>

                @empty

                    <p>
                        Non hai ancora abitudini, inizia ad aggiungerne una!
                    </p>
                    <a href="{{route('habits.create')}}" class="bg-white p-2 border-2">
                        Aggiungi abitudine
                    </a>
                    
                @endforelse
            </ul>
        </div>
    </main>
</x-layout>