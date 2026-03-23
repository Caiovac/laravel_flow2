<x-layout>
    <main class="py-10">
        <h1 class="text-3xl font-bold text-center">Benvenuto nella tua dashboard, {{ auth()->user()->name }}</h1>
        <p class="text-center mt-4">Qui puoi vedere le tue abitudini e i tuoi progressi.</p>
    </main>
</x-layout>