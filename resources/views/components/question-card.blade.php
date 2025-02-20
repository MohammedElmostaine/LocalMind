<div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow">
    <div class="flex items-start justify-between">
        <div class="flex-1">
            <h3 class="text-lg font-semibold">
                <a href="{{ route('questions.show', $question) }}" class="text-indigo-600 hover:text-indigo-800">
                    {{ $question->title }}
                </a>
            </h3>
            <p class="mt-2 text-gray-600 line-clamp-2">
                {{ $question->content }}
            </p>
            <div class="mt-4 flex items-center text-sm text-gray-500">
                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>{{ $question->location }}</span>
                <span class="mx-2">•</span>
                <span>{{ $question->created_at->diffForHumans() }}</span>
            </div>
        </div>
        
        <div class="ml-4 flex flex-col items-center">
            <span class="text-2xl font-semibold text-gray-700">{{ $question->answers_count }}</span>
            <span class="text-sm text-gray-500">answers</span>
        </div>
    </div>

    <div class="mt-4 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <div class="flex items-center">
                <img src="{{ $question->user->avatar }}" alt="" class="h-6 w-6 rounded-full">
                <span class="ml-2 text-sm text-gray-600">{{ $question->user->name }}</span>
            </div>
        </div>

        @auth
            <button 
                onclick="toggleFavorite('{{ $question->id }}')"
                class="favorite-button flex items-center text-sm {{ $question->isFavorited ? 'text-yellow-500' : 'text-gray-500' }} hover:text-yellow-500"
            >
                <svg class="h-5 w-5 mr-1" fill="{{ $question->isFavorited ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
                <span>{{ $question->favorites_count }}</span>
            </button>
        @endauth
    </div>
</div>