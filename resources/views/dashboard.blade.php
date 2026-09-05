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
                {{ date('d/m/Y') }}
            </h2>
            <ul class="flex flex-col gap-2 ">

                @forelse ($habits as $habit)
               
                          
                <li class="habit-shadow-lg p-2 flex justify-between items-center bg-[#FFDDAC]">
                    <form method="POST" action="{{ route('habits.toggle', $habit->id) }}" class="flex gap-2 items-center" id="form-{{ $habit->id }}">
                        @csrf
                        <input type="checkbox" class="w-5 h-5" {{ $habit->is_completed ? 'checked' : '' }}
                        {{ $habit->wasCompletedToday() ? 'checked' : '' }} onchange="document.getElementById('form-{{ $habit->id }}').submit()">
                        <p class="font-bold text-lg">
                          - {{ $habit->name }}
                        </p>
                        
                    </form>
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
