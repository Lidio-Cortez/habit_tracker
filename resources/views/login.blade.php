<x-layout>
    <main class="py-10">
        <section class="bg-white max-w-150 mx-auto p-10 pb-6 border-2 mt-4">
            <h1 class="font-bold text-3xl">
                Faça login
            </h1>
            <p>
                Insira os seu dados para acessar
            </p>
            <form action="{{ route('auth.login') }}" method="post" class="flex flex-col">
                @csrf
                <div class="flex flex-col gap-2 mb-4">
                    <label for="email">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        placeholder="youremail@gmail.com" 
                        class="bg-white 
                            p-2 
                            border-2 
                            @error('email')
                                border-red-600
                            @enderror">
                    @error('email')
                        <p class="text-red-400 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                 <div class="flex flex-col gap-2 mb-4">
                    <label for="password">Password</label>    
                    <input type="password" 
                           name="password" 
                           id="password" 
                           placeholder="*****" 
                           class="bg-white 
                                p-2 
                                border-2 
                                @error('password')
                                    border-red-600
                                @enderror">
                    @error('password')
                        <p class="text-red-400 text-sm">
                             {{ $message }}
                        </p>
                    @enderror
                </div>
                <button type="submit" class="bg-white border-2 p-2">Entrar</button>
                
            </form>
            <p class="text-center mt-2">
                Ainda não tens uma conta?
                <a href="{{ route('site.register') }}" class="underline hover:opacity-50 trasition-1">
                    Registe-se
                </a>
            </p>
        </section>
        
    </main>
</x-layout>