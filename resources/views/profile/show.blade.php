@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Profile Info -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="text-center">
                    <img class="h-32 w-32 rounded-full mx-auto" 
                         src="{{ auth()->user()->avatar }}" 
                         alt="{{ auth()->user()->name }}">
                    <h2 class="mt-4 text-xl font-semibold">{{ auth()->user()->name }}</h2>
                    <p class="text-gray-600">Member since {{ auth()->user()->created_at->format('M Y') }}</p>
                </div>

                <div class="mt-6">
                    <dl class="space-y-4">
                        <div class="flex justify-between">
                            <dt class="text-gray-500">Questions</dt>
                            <dd class="font-semibold">{{ $stats->questions_count }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-gray-500">Answers</dt>
                            <dd class="font-semibold">{{ $stats->answers_count }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-gray-500">Favorites</dt>
                            <dd class="font-semibold">{{ $stats->favorites_count }}</dd>
                        </div>
                    </dl>
                </div>

                <div class="mt-6">
                    <a href="{{ route('profile.edit') }}" 
                       class="block w-full text-center bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>

        <!-- Activity Feed -->
        <div class="md:col-span-2">
            <!-- Tabs -->
            <div class="bg-white rounded-lg shadow">
                <nav class="flex divide-x divide-gray-200">
                    <a href="{{ route('profile.questions') }}" 
                       class="flex-1 px-6 py-4 text-center {{ request()->routeIs('profile.questions') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-500 hover:text-gray-700' }}">
                        Questions
                    </a>
                    <a href="{{ route('profile.answers') }}" 
                       class="flex-1 px-6 py-4 text-center {{ request()->routeIs('profile.answers') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-500 hover:text-gray-700' }}">
                        Answers
                    </a>
                    <a href="{{ route('favorites') }}" 
                       class="flex-1 px-6 py-4 text-center {{ request()->routeIs('favorites') ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-500 hover:text-gray-700' }}">
                        Favorites
                    </a>
                </nav>
            </div>

            <!-- Content -->
            <div class="mt-6">
                @yield('profile-content')
            </div>
        </div>
    </div>
</div>
@endsection