<x-layout>
    <main class="max-w-5xl mx-auto py-10 px-4 min-h-[80vh] w-full">
        <x-navbar />
        <div class="flex flex-col items-start gap-4">
            <x-title>
             {{ \Carbon\Carbon::now('Europe/Rome')->locale('it')->translatedFormat('l, d F') }}
            </x-title> 
            
            <ul class="flex flex-col gap-2 w-full">

                @forelse ($habits as $item)

                <li class="habit-shadow-lg p-2 bg-[#FFDAAC]">
                    <form
                        method="POST"
                        action="{{ route('habits.toggle', $item->id) }}"
                        class="flex grap-2 items-center"
                        id="form-{{$item->id}}"
                     >
                        @csrf
                        
                        <input 
                        type="checkbox" 
                        class="w-6 h-6" {{$item->is_completed ? 'checked' : ''}} 
                        {{  $item->wasCompletedToday() ? 'checked' : ''}}
                        onchange ="document.getElementById('form-{{$item->id}}').submit()"
                        />
                        <p class="font-bold text-lg">
                            {{ $item->name }}
                        </p>
                        
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

            <a href="{{route('habits.create')}}" class="habit-btn habit-shadow-lg bg-habit-orange p-2">Aggiungi abitudine</a>
        </div>
    </main>
</x-layout>