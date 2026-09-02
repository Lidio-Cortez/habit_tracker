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
            <h2 class="text-xl mt-4">
                Listagem de habitos
            </h2>
            <ul class="flex flex-col gap-2 ">
                @forelse ($habits as $habit)
                          
                <li class="pl-4">
                    <div class="flex gap-2 items-center">
                        <p class="font-bold text-xl">
                          - {{ $habit->name }}
                        </p>
                        <span class="font-light text-md">
                          ( {{ $habit->created_at->format('d/m/Y') }} )
                        </span>
                        <p>
                            [{{ $habit->habbitLogs->count() }}]
                        </p>
                    </div>
                </li>

                @empty
                    <p class="text-gray-500">
                        Nenhum hábito cadastrado.
                    </p>
                @endforelse
            </ul>
        </p>
    </main>
</x-layout>