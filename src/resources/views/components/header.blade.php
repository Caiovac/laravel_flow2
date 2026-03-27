<header class="bg-white border-b-2 flex items-center justify-between p-4">
    <div class="flex items-center gap-2">
        <a href="{{ route('index') }}" class="habit-btn habit-shadow-lg px-2 py-1 bg-habit-orange">
            HT
        </a>
        <p>
            Habit Tracker
        </p>
    </div>

    @auth
        <form class="inline" action="{{route('auth.logout')}}" method="POST">
            @csrf
            <button type="submit" class="habit-btn habit-shadow-lg bg-habit-orange p-2">Logout</button>
        </form>
    @endauth

    @guest 
        <div class="flex gap-4">
            <a href="{{route('site.login')}}" class="habit-btn habit-shadow-lg bg-habit-orange p-2">Login</a>
            <a href="{{route('site.register')}}" class="habit-btn habit-shadow-lg p-2">Registra</a>
        </div>
    @endguest
</header>   