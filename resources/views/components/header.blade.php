<header class="bg-white flex items-center justify-between p-4 border-b-2">
    <div>
        logo
    </div>
    <div>
        github

        @auth
            <a href="{{ route('auth.logout') }}" class="bg-white p-2 border-2 inline">
                Sair
            </a>
        @endauth

        @guest
            <a href="{{ route('site.login') }}" class="bg-white p-2 border-2">
                Login
            </a>   
        @endguest
    </div>
</header>