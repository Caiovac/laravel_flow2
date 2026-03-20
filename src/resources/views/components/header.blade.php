<header class="bg-white border-b-2 flex items-center justify-between p-4">
    <div>
        LOGO
    </div>
    <div>
        GITHUB
    </div>

    @auth
        <form action="{{route('auth.logout')}}" method="POST">
            @csrf
            <button type="submit" class="text-gray-700 hover:text-blue-500">Logout</button>
        </form>
    @endauth

    @guest
        <div>
            <a href="{{route('site.login')}}" class="text-gray-700 hover:text-blue-500">Login</a>
        </div>
    @endguest
</header>   