<div class="space-y-6">
    @foreach($questions as $question)
        <div class="bg-white rounded-2xl p-4 sm:p-6 shadow-lg hover:shadow-xl transition-all cursor-pointer questions-card">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-purple-600 to-pink-600 flex items-center justify-center text-white font-bold">
                        {{ substr($question->user->name, 0, 2) }}
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="font-medium text-gray-900 truncate">{{ $question->user->name }}</span>
                        <span class="text-sm text-gray-500">• {{ $question->created_at->diffForHumans() }}</span>
                    </div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-2">
                        {{ $question->title }}
                    </h3>
                    <p class="text-gray-600 mb-4">
                        {{ $question->body }}
                    </p>
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex items-center gap-2 text-gray-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            <span>{{ $question->user->profile->city ?? 'Inconnue' }}</span>
                        </div>
                        <div>
                            <x-floating-button class="ml-auto text-gray-400 hover:text-pink-600 transition-colors toggle-comments-{{ $question->id }}">
                                <span>Comments</span>
                            </x-floating-button>
                        </div>
                        <div>
                            @auth
                                <form action="{{ route('questions.like', $question) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" 
                                        class="flex items-center gap-2 {{ $question->isLikedBy(Auth::user()) ? 'text-pink-600' : 'text-gray-400' }} hover:text-pink-600 transition-colors">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                                        </svg>
                                        <span>{{ $question->likes()->count() }}</span>
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" 
                                    class="flex items-center gap-2 text-gray-400 hover:text-pink-600 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                                    </svg>
                                    <span>{{ $question->likes()->count() }}</span>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <div class="comments-section-{{ $question->id }} hidden mt-4">
                <div class="bg-gray-50 p-4 rounded-xl shadow-inner">
                    <h4 class="text-lg font-semibold mb-2">Commentaires</h4>
                    @foreach($question->comments as $comment)
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-r from-purple-600 to-pink-600 flex items-center justify-center text-white font-bold">
                                {{ substr($comment->user->name, 0, 2) }}
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="font-medium text-gray-900">{{ $comment->user->name }}</span>
                                    <span class="text-sm text-gray-500">• {{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-gray-600">
                                    {{ $comment->body }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-4">
                        <form action="{{ route('comments.store', $question->id) }}" method="POST">
                            @csrf
                            <input type="text" name="body" placeholder="Ajouter un commentaire..." class="w-full px-4 py-2 bg-gray-100 rounded-xl border-0 focus:ring-2 focus:ring-purple-600">

                            <button type="submit" class="mt-2 px-4 py-2 bg-purple-600 text-white rounded-xl hover:bg-purple-700 transition-colors">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
