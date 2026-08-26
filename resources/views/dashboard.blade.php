<x-layout>
    <main class="py-10">
        <h1 >
            Dashboard
        </h1>
        <p>
            Seja bem vindo, {{ auth()->user()->name }}
        </p>
    </main>
</x-layout>