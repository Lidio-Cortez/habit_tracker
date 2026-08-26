<x-layout>
    <main class="py-10">
        <h1 >
            Veja os seus habitos ganharem a vida
        </h1>
        <p>
            @auth()
                Seja bem vindo {{ auth()->user()->name }} !
            @endauth
        </p>
    </main>
</x-layout>