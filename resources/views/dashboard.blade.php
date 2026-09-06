<x-layout>
    <main class="max-w-5xl mx-auto py-10 px-4 min-h-[80vh] w-full">
       <x-navbar />
       
      <div class="flex flex-col gap-4 items-start">
          <p class="pt-6">
              <h2 class="text-lg mt-8 font-bold">
                  {{ carbon\carbon::now()->locale('pt_PT')->translatedFormat('l, d \d\e F ') }}
            </h2>
            <ul class="flex flex-col gap-2 w-full">
                
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
             <a href="{{ route('habits.create') }}" class="bg-habit-orange habit-shadow-lg p-2 border-2">
                    + Adcionar
                </a>   
        </div>
    </main>
</x-layout>
