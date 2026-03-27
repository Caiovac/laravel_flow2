<x-layout>
    <main class="py-10 min-h-[calc(100vh-160px)]">
    
    <section class="bg-white habit-shadow max-w-[600px] mx-auto p-10 border-2 mt-4">

        <h1 class="font-bold text-2xl text-center">Registrati</h1>   
        <p class="text-center mt-4">Inserisci i tuoi dati per creare un account.</p>

        <form action="{{ route('auth.register') }}" method="POST" class="flex flex-col">

            @csrf

            <div class="flex flex-col gap-2 mb-4">
                <label for="name" class="mb-2 font-semibold">Nome</label>
                <input 
                type="name"
                name="name" 
                placeholder="Il tuo nome" 
                class="p-2 bg-white habit-shadow" @error('name') border-red-500 @enderror>
                
                @error('name')
                    <p class="text-red-500">
                    {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex flex-col gap-2 mb-4">
                <label for="cognome" class="mb-2 font-semibold">Cognome</label>
                <input 
                type="text"
                name="cognome" 
                placeholder="Il tuo cognome" 
                class="p-2 bg-white habit-shadow" @error('cognome') border-red-500 @enderror>
                
                @error('cognome')
                    <p class="text-red-500">
                    {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex flex-col gap-2 mb-4">
                <label for="email" class="mb-2 font-semibold">Email</label>
                <input 
                type="email"
                name="email" 
                placeholder="your@email.com" 
                class="p-2 bg-white habit-shadow" @error('email') border-red-500 @enderror>
                
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
                class="p-2 bg-white habit-shadow" @error('password') border-red-500 @enderror>

                @error('password')
                    <p class="text-red-500">
                    {{ $message }}
                    </p>
                @enderror

            </div>
            
            <div class="flex flex-col gap-2 mb-4">
                <label for="password_confirmation" class="mb-2 font-semibold">Conferma Password</label>
                <input
                type="password" 
                name="password_confirmation" 
                placeholder="*******" 
                class="p-2 bg-white habit-shadow" @error('password') border-red-500 @enderror>

                @error('password')
                    <p class="text-red-500">
                    {{ $message }}
                    </p>
                @enderror

            </div>

             <button 
                type="submit"
                class="p-2 mt-6 bg-habit-orange habit-shadow-lg habit-btn" 
            >
                Login  
            </button>
        </form>
        <p class="text-center mt-4">
            Hai già un account? 
            <a href="{{ route('site.login') }}" class="underline hover:text-habit-orange transition">Accedi qui</a>.
        </p>
        
    </section>
    </main>
</x-layout>