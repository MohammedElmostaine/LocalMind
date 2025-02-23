<nav class="w-full bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4 sm:gap-8">
                <span class="text-xl sm:text-2xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 text-transparent bg-clip-text">
                    AskLocal
                </span>
                <div class="hidden md:flex items-center gap-6">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-purple-600 transition-colors">Explorer</a>
                    <a href="{{ route('questions.index') }}" class="text-gray-600 hover:text-purple-600 transition-colors">Tendances</a>
                    <a href="#" class="text-gray-600 hover:text-purple-600 transition-colors">Communauté</a>
                </div>
            </div>
            <div class="flex items-center gap-4">
                @auth
                    <span class="text-gray-700">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-4 py-2 rounded-xl hover:opacity-90 transition-opacity">
                            Déconnexion
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-700">Connexion</a>
                    <a href="{{ route('register') }}"
                       class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-4 py-2 rounded-xl hover:opacity-90 transition-opacity">
                        Rejoindre
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
