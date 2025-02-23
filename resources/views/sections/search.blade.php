<div class="relative mb-12">
    <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 rounded-3xl opacity-10 blur-xl"></div>
    <div class="relative bg-white rounded-3xl shadow-xl p-4 sm:p-8">
        <form action="{{ route('questions.search') }}" method="GET">
            <div class="grid md:grid-cols-3 gap-4 sm:gap-6">
                <div class="col-span-2">
                    <input type="text"
                           name="query"
                           placeholder="Quelle est votre question ?"
                           class="w-full px-4 sm:px-6 py-4 bg-gray-50 rounded-xl border-0 focus:ring-2 focus:ring-purple-600">
                </div>
                <div class="relative">
                    <input type="text"
                           placeholder="Votre localisation"
                           class="w-full pl-4 sm:pl-6 pr-12 py-4 bg-gray-50 rounded-xl border-0 focus:ring-2 focus:ring-purple-600">
                    <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 bg-gradient-to-r from-purple-600 to-pink-600 text-white p-2 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0z"/>
                        </svg>
                    </button>
                </div>
            </div>



</div>    </div>        </form>
