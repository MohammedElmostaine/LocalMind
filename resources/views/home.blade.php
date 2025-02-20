@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Left Sidebar - Statistics -->
    <div class="md:col-span-1">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Statistics</h2>
            <div class="space-y-4">
                <div class="flex justify-between">
                    <span class="text-gray-600">Total Questions</span>
                    <span class="font-semibold">{{ $totalQuestions }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Total Answers</span>
                    <span class="font-semibold">{{ $totalAnswers }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Active Users</span>
                    <span class="font-semibold">{{ $activeUsers }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content - Questions -->
    <div class="md:col-span-2">
        <!-- Search Bar -->
        <div class="mb-6">
            <form action="{{ route('questions.search') }}" method="GET">
                <div class="flex gap-4">
                    <input type="text" 
                           name="query" 
                           placeholder="Search questions..." 
                           class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <button type="submit" 
                            class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                        Search
                    </button>
                </div>
            </form>
        </div>

        <!-- Questions List -->
        <div class="space-y-6">
            @foreach($questions as $question)
                @include('components.question-card', ['question' => $question])
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $questions->links() }}
        </div>
    </div>
</div>
@endsection