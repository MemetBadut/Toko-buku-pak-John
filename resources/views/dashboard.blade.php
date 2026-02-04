<x-app-layout>
    <x-slot:header>
        @auth
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Welcome, {{ $user->name }}!
            </h2>
        @endauth
    </x-slot:header>

    <div class="py-12">
        <div class="min-h-screen bg-linear-to-br px-4">
            <div class="container mx-auto">
                {{-- Books Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                    {{-- Book Card 1 - Trending & Available --}}
                    <div
                        class="group relative bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">

                        <div class="absolute top-3 right-3 z-10">
                            <div
                                class="bg-linear-to-r from-red-500 to-pink-500 text-white px-3 py-1.5 rounded-full text-xs font-bold flex items-center gap-1 shadow-lg animate-pulse">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" />
                                </svg>
                                TRENDING
                            </div>
                        </div>

                        <div class="relative overflow-hidden bg-linear-to-br from-gray-100 to-gray-200 h-72">
                            <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e?w=400"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                alt="Book Cover">

                            <div class="absolute bottom-3 left-3">
                                <span
                                    class="bg-green-500 text-white text-xs font-semibold px-3 py-1.5 rounded-full flex items-center gap-1.5 shadow-md">
                                    <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                                    Available
                                </span>
                            </div>
                        </div>

                        <div class="p-5">
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-1 rounded-full">Fiction</span>
                                <span
                                    class="bg-purple-100 text-purple-800 text-xs font-semibold px-2.5 py-1 rounded-full">Mystery</span>
                            </div>

                            <h3
                                class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 min-h-[3.5rem] group-hover:text-blue-600 transition-colors">
                                The Great Adventure
                            </h3>

                            <p class="text-sm text-gray-600 mb-3 flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span class="font-medium">John Doe</span>
                            </p>

                            <p class="text-xs text-gray-500 mb-4 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                </svg>
                                ISBN: 978-0-123456-78-9
                            </p>

                            <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-200">
                                <div class="flex items-center gap-2">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                        <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                        <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                        <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                        <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                    </div>
                                    <span class="text-lg font-bold text-gray-900">4.0</span>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs text-gray-500">Based on</p>
                                    <p class="text-sm font-semibold text-gray-700">1,234 reviews</p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="flex items-center justify-between bg-green-50 px-3 py-2 rounded-lg">
                                    <div class="flex items-center gap-2">
                                        <div class="bg-green-100 p-1 rounded-full">
                                            <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-green-700 font-medium">Rating improved</p>
                                            <p class="text-xs text-green-600">↑ 0.3 in last 7 days</p>
                                        </div>
                                    </div>
                                    <span class="text-green-600 font-bold text-sm">+7.5%</span>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <button
                                    class="flex-1 bg-linear-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-4 py-2.5 rounded-xl font-medium transition transform hover:scale-105 shadow-md flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    Detail
                                </button>
                                <button
                                    class="bg-white border-2 border-gray-300 hover:border-blue-600 text-gray-700 hover:text-blue-600 px-4 py-2.5 rounded-xl font-medium transition transform hover:scale-105 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Book Card 2 - Out of Stock, Rating Declined --}}
                    <div
                        class="group relative bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">

                        <div class="relative overflow-hidden bg-linear-to-br from-gray-100 to-gray-200 h-72">
                            <img src="https://images.unsplash.com/photo-1589998059171-988d887df646?w=400"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                alt="Book Cover">

                            <div class="absolute bottom-3 left-3">
                                <span
                                    class="bg-red-500 text-white text-xs font-semibold px-3 py-1.5 rounded-full flex items-center gap-1.5 shadow-md">
                                    <span class="w-2 h-2 bg-white rounded-full"></span>
                                    Out of Stock
                                </span>
                            </div>
                        </div>

                        <div class="p-5">
                            <div class="flex flex-wrap gap-2 mb-3">
                                <span
                                    class="bg-orange-100 text-orange-800 text-xs font-semibold px-2.5 py-1 rounded-full">Romance</span>
                            </div>

                            <h3
                                class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 min-h-[3.5rem] group-hover:text-blue-600 transition-colors">
                                Love in Paris
                            </h3>

                            <p class="text-sm text-gray-600 mb-3 flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span class="font-medium">Jane Smith</span>
                            </p>

                            <p class="text-xs text-gray-500 mb-4 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                </svg>
                                ISBN: 978-0-987654-32-1
                            </p>

                            <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-200">
                                <div class="flex items-center gap-2">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                        <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                        <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                        <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                        <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                    </div>
                                    <span class="text-lg font-bold text-gray-900">3.0</span>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs text-gray-500">Based on</p>
                                    <p class="text-sm font-semibold text-gray-700">856 reviews</p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="flex items-center justify-between bg-red-50 px-3 py-2 rounded-lg">
                                    <div class="flex items-center gap-2">
                                        <div class="bg-red-100 p-1 rounded-full">
                                            <svg class="w-4 h-4 text-red-600" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M12 13a1 1 0 100 2h5a1 1 0 001-1V9a1 1 0 10-2 0v2.586l-4.293-4.293a1 1 0 00-1.414 0L8 9.586 3.707 5.293a1 1 0 00-1.414 1.414l5 5a1 1 0 001.414 0L11 9.414 14.586 13H12z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-red-700 font-medium">Rating declined</p>
                                            <p class="text-xs text-red-600">↓ 0.2 in last 7 days</p>
                                        </div>
                                    </div>
                                    <span class="text-red-600 font-bold text-sm">-6.3%</span>
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <button
                                    class="flex-1 bg-linear-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-4 py-2.5 rounded-xl font-medium transition transform hover:scale-105 shadow-md flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    Detail
                                </button>
                                <button
                                    class="bg-white border-2 border-gray-300 hover:border-blue-600 text-gray-700 hover:text-blue-600 px-4 py-2.5 rounded-xl font-medium transition transform hover:scale-105 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>x
        </div>
    </div>

</x-app-layout>
