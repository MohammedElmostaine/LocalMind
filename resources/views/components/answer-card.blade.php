<div class="bg-white rounded-lg shadow p-6" id="answer-{{ $answer->id }}">
    <div class="prose max-w-none">
        {{ $answer->content }}
    </div>

    <div class="mt-4 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <img src="{{ $answer->user->avatar }}" alt="" class="h-8 w-8 rounded-full">
            <div>
                <div class="font-medium text-gray-900">{{ $answer->user->name }}</div>
                <div class="text-sm text-gray-500">
                    Answered {{ $answer->created_at->diffForHumans() }}
                </div>
            </div>
        </div>

        @auth
            @if(auth()->user()->id === $answer->user_id)
                <div class="flex items-center space-x-2">
                    <button onclick="editAnswer('{{ $answer->id }}')" 
                            class="text-gray-400 hover:text-gray-500">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </button>
                    <form action="{{ route('answers.destroy', $answer) }}" 
                          method="POST" 
                          class="inline"
                          onsubmit="return confirm('Are you sure you want to delete this answer?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-gray-400 hover:text-red-500">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </form>
                </div>
            @endif
        @endauth
    </div>
</div>