<x-layout>
    <main class="max-w-5xl mx-auto py-10 min-h-[calc(100vh-160px)] px-4 w-full">
        <x-navbar />

        @session('success')
            <div class="flex">
            <p class="bg-green-100 border-2 border-green-500 text-green-700 p-3 mb-4 max-w-[200px] block">
                {{session('success')}}
            </p>
            </div>
        @endsession

        <div>
            <x-title>
                Configurare abitudini
            </x-title>
            <ul class="flex flex-col gap-2">

                @forelse ($habits as $item)

                <li class="flex grap-2 items-center justify-between w-full">
                    <div class="habit-shadow-lg p-2 bg-[#FFDAAC] w-full">
                        <p class="font-bold text-lg">
                            {{ $item->name }}
                        </p>
                    </div>
                    <a href="{{ route('habits.edit', $item) }}" class="bg-white habit-shadow-lg p-2 ml-2 hover:opacity-50">
                            <x-icons.pencil />
                    </a>
                    <form action="{{route('habits.destroy', $item)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="habit-shadow-lg bg-red-500 text-white p-2 ml-2 hover:opacity-50">
                            <x-icons.trash />
                        </button>
                    </form> 
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

