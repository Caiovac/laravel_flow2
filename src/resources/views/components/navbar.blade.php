<nav>
    <ul class="flex gap-4 item-center">
        <li>
            <a href="{{ route('habits.index') }}" class="{{ Route::is('habits.index') ? 'font-bold underline' : ''}} text-md border-r-2 border-habit-orange pr-2 hover:underline">
                Oggi
            </a>
        </li>
        <li>
            <a href="#" class="font-blod text-md border-r-2 border-habit-orange pr-2 hover:underline">
                Storico
            </a>
        </li>
        <li>
            <a href="#" class="font-blod text-md border-r-2 border-habit-orange pr-2 hover:underline">
                Calendario
            </a>
        </li>
        <li>
            <a href="{{ route('habits.settings') }}" class="{{ Route::is('habits.settings') ? 'font-bold underline' : ''}} text-md border-r-2 border-habit-orange pr-2 hover:underline">
                Gestire abitudini
            </a>
        </li>
    </ul>
</nav>

