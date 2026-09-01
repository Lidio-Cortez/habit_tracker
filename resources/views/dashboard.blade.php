<x-layout>
    <main class="py-10">
        <h1 class="font-bold text-4xl text-center">
            Dashboard
        </h1>
        <a href="{{ route('habit.create'); }}" class="p-2 border-2 bg-white font-bold">
            Cadastrar habito
        </a>
        @session('success')
            <p class="bg-green-100 border border-green-500 px-2 block mt-4">
                {{ session('success') }}
            </p>
        @endsession
        <p class="pt-6">
            Listagem de habitos
        </p>
    </main>
</x-layout>