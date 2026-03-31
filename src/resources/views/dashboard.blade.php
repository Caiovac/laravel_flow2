<x-layout>
    <main class="py-10 min-h-[calc(100vh-160px)] px-4">
        <x-navbar />
        @session('success')
            <div class="flex">
            <p class="bg-green-100 border-2 border-green-500 text-green-700 p-3 mb-4 max-w-[200px] block">
                {{session('success')}}
            </p>
            </div>
        @endsession

        <div>
            <h2 class="text-lg mt-8 mb-2">{{ date('d/m/Y') }}</h2>

            <ul class="flex flex-col gap-2">

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
        </div>
    </main>
</x-layout>