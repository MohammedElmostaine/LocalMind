@extends('layouts.app')

@section('title', $question->title)

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Question Details -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <div class="flex justify-between items-start">
            <h1 class="text-2xl font-bold text-gray-900">{{ $question->title }}</h1>
            <div class="flex items-center space-x-4">
                @auth
                    @if(auth()->user()->id === $question->user_id)
                        <a href="{{ route('questions.edit', $question) }}" 
                           class="text-indigo-600 hover:text-indigo-800">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </a>
                    @endif
                    <button onclick="toggleFavorite('{{ $question->id }}')"
                            class="favorite-button {{ $question->isFavorited ? 'text-yellow-500' : 'text-gray-500' }} hover:text-yellow-500">
                        <svg class="h-5 w-5" fill="{{ $question->isFavorited ? 'currentColor' : 'none' }}" 
                             stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                    </button>
                @endauth
            </div>
        </div>

        <div class="mt-4 text-gray-600 space-y-4">
            {{ $question->content }}
        </div>

        <div class="mt-6 flex items-center justify-between text-sm text-gray-500">
            <div class="flex items-center space-x-4">
                <img src="{{ $question->user->avatar }}" alt="" class="h-8 w-8 rounded-full">
                <span>{{ $question->user->name }}</span>
                <span>•</span>
                <span>{{ $question->created_at->diffForHumans() }}</span>
            </div>
            <div class="flex items-center">
                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                </svg>
                <span>{{ $question->location }}</span>
            </div>
        </div>
    </div>

    <!-- Answers Section -->
    <div class="mt-8">
        <h2 class="text-xl font-semibold mb-4">{{ $question->answers_count }} Answers</h2>
        
        @auth
            <!-- Answer Form -->
            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <form action="{{ route('answers.store', $question) }}" method="POST">
                    @csrf
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700">
                            Your Answer
                        </label>
                        <textarea name="content" 
                                  id="content" 
                                  rows="4" 
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                  required></textarea>
                    </div>
                    <div class="mt-4 flex justify-end">
                        <button type="submit" 
                                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                            Post Answer
                        </button>
                    </div>
                </form>
            </div>
        @else
            <div class="bg-gray-50 rounded-lg p-6 text-center mb-6">
                <p class="text-gray-600">
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800">Login</a>
                    or
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800">Register</a>
                    to post an answer
                </p>
            </div>
        @endauth

        <!-- Answers List -->
        <div class="space-y-6">
            @foreach($question->answers as $answer)
                @include('components.answer-card', ['answer' => $answer])
            @endforeach
        </div>
    </div>
</div>
@endsection