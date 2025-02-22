@extends('layouts.app')

@section('content')
    @include('sections.hero')
    <main class="max-w-7xl mx-auto px-4 sm:px-6 pb-16">
        @include('sections.search')
        @include('sections.addquestion')
        @include('sections.stats')
        @include('sections.questions-feed')
    </main>
@endsection