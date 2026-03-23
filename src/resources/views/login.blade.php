<x-layout>
    <main class="py-10">
    
    <section class="bg-white  max-w-[600px] mx-auto p-10 border-2 mt-4">

        <h1 class="font-bold text-2xl text-center">Login</h1>   
        <p class="text-center mt-4">Inserisci le tue credenziali per accedere.</p>

        <form action="{{ route('auth.authenticate') }}" method="POST" class="flex flex-col">

            @csrf

            <div class="flex flex-col gap-2 mb-4">
                <label for="email" class="mb-2 font-semibold">Email</label>
                <input 
                type="email"
                name="email" 
                placeholder="your@email.com" 
                class="border p-2 w-full mb-4" @error('email') border-red-500 @enderror>
                
                @error('email')
                    <p class="text-red-500">
                    {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex flex-col gap-2 mb-4">
                <label for="password" class="mb-2 font-semibold">Password</label>
                <input
                type="password" 
                name="password" 
                placeholder="*******" 
                class="border p-2 w-full mb-4" @error('password') border-red-500 @enderror>

                @error('password')
                    <p class="text-red-500">
                    {{ $message }}
                    </p>
                @enderror

            </div>

             <button 
                type="submit"
                class="bg-white border-2 p-2 w-full hover:bg-gray-100 transition-colors" 
            >
                Login  
            </button>
        </form>
        <p class="text-center mt-4">
            Non hai un account? 
            <a href="{{ route('site.register') }}" class="underline hover:opacity-50 transition">Registrati qui</a>.
        </p>
        
    </section>
    </main>
</x-layout>