<x-layout>
    <main class="py-10 min-h-[calc(100vh-160px)] px-4">
       <x-navbar />
       
        
        @session('success')
            <p class="bg-green-100 border border-green-500 px-2 block mt-4">
                {{ session('success') }}
            </p>
        @endsession
        <p class="pt-6">
            <h2 class="text-lg mt-8 mb-4">
                Configurar Hábitos
            </h2>
            <ul class="flex flex-col gap-2 ">
                @forelse ($habits as $habit)
                          
                <li class="habit-shadow-lg p-2 flex justify-between items-center bg-[#FFDDAC]">
                    <div class="flex gap-2 items-center">
                        <input type="checkbox" class="w-5 h-5 {{ $habit->is_completed ? 'check' : '' }}"  name="" id="">
                        <p class="font-bold text-lg">
                          - {{ $habit->name }}
                        </p>
                        <span class="font-light text-md">
                          ( {{ $habit->created_at->format('d/m/Y') }} )
                        </span>
                        <a href="{{ route('habits.edit', $habit->id) }}" class="bg-white text-white p-1 border-2 hover:opacity-50">
                            <x-icons.edit />
                        </a>
                        <form action="{{ route('habits.destroy',$habit->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white p-1 border-2 hover:opacity-50 cursor-pointer" type="submit">
                                <x-icons.trash  />
                            </button>
                        </form>
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
