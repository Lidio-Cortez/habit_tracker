<x-layout>
    <main class="py-10">
         <section class="bg-white max-w-150 mx-auto p-10 pb-6 border-2 mt-4">
        <h1>
            Editar Habito
        </h1>
        <form action="{{ route('habits.update', $habit->id) }}" method="post" class="flex flex-col">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-2 mb-2">
                <label for="name">Nome do Hábito</label>
                <input type="text" name="name" id="name" value="{{ $habit->name }}" placeholder="Ex: Ler 10 páginas por dia" class="bg-white p-2 border-2 @error('email') border-red-500 @enderror">
                @error('name')
                <p class="text-red-500 text-sm">
                    {{ $message }}
                </p>
                @enderror
                <button type="submit" class="bg-white border-2 p-2">Actualizar</button>
            </div>
        </form>
         </section>
    </main>
</x-layout>