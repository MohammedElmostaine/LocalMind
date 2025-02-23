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
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="comments-section-{{ $question->id }} hidden mt-4">
                <div class="bg-gray-50 p-4 rounded-xl shadow-inner">
                    <h4 class="text-lg font-semibold mb-2">Commentaires</h4>
                    <div class="space-y-4">
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
                                        {{ $comment->body  }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        <input type="text" placeholder="Ajouter un commentaire..." class="w-full px-4 py-2 bg-gray-100 rounded-xl border-0 focus:ring-2 focus:ring-purple-600">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
