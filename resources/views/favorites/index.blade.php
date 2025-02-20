@extends('layouts.app')

@section('title', 'My Favorites')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow">
        <div class="px-4 py-5 sm:px-6">
            <h1 class="text-xl font-semibold text-gray-900">My Favorites</h1>
        </div>
        
        <div class="border-t border-gray-200">
            @if($favorites->count() > 0)
                <div class="divide-y divide-gray-200">
                    @foreach($favorites as $favorite)
                        <div class="p-6 hover:bg-gray-50">
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <a href="{{ route('questions.show', $favorite->question) }}" 
                                       class="text-lg font-medium text-indigo-600 hover:text-indigo-800">
                                        {{ $favorite->question->title }}
                                    </a>
                                    <p class="mt-1 text-sm text-gray-500">
                                        {{ Str::limit($favorite->question->content, 150) }}
                                    </p>
                                    <div class="mt-2 flex items-center text-sm text-gray-500">
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        </svg>
                                        <span>{{ $favorite->question->location }}</span>
                                        <span class="mx-