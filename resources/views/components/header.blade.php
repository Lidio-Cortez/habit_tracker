<header class=" bg-white p-4 border-b-2">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <div class="flex items-center gap-2 font-bold">
            <a href="{{ route('habits.index') }}" class="habit-btn habit-shadow-lg px-2 py-1 bg-habit-orange">
                HT
            </a>
            <p>
                Habit Tracker
            </p>
        </div>
        <div class="flex gap-2 items-center">
            
            @auth
            <a href="{{ route('auth.logout') }}" class="bg-white habit-shadow-lg habit-btn p-2 border-2 inline">
                Sair
            </a>
            @endauth
            
            @guest
            <div class="flex gap-2">
                <a href="{{ route('site.login') }}" class="bg-habit-orange habit-shadow-lg p-2 border-2">
                    Logar
                </a>   
                <a href="{{ route('site.register') }}" class=" habit-shadow-lg p-2 border-2">
                    Registar
                </a>   
            </div>
            @endguest
            <a href="#" class="habit-btn habit-shadow-lg bg-habit-orange p-1">
                <x-icons.github />
            </a>
        </div>
    </div>
</header>