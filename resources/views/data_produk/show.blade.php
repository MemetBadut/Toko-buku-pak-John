<x-app-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book By Kategori') }}
        </h2>
    </x-slot:header>

    <div class="max-w-6xl mx-auto bg-white space-y-12 mt-7">
        <div class="mb-16">
            <div class="space-y-6">
                <div
                    class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300">
                    <div class="flex flex-col md:flex-row">
                        <!-- Book Cover -->
                        <div class="md:w-48 h-64 md:h-auto overflow-hidden shrink-0">
                            <img src="" alt="Ini bapak Bud"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>

                        <!-- Book Info -->
                        <div class="flex-1 p-6 flex flex-col">
                            <div class="flex items-start justify-between mb-3">
                                <div class="flex-1">
                                    <h3 class="font-bold text-2xl text-gray-900 mb-1" x-text="book.title"></h3>
                                    <p class="text-gray-600" x-text="'By ' + book.author"></p>
                                </div>
                                <div class="flex items-center gap-1 bg-yellow-100 px-3 py-1.5 rounded-lg ml-4">
                                    <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <span class="font-bold text-gray-800" x-text="book.rating"></span>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="px-4 py-1.5 bg-indigo-600 text-white rounded-full text-sm font-medium">{{ $data_produk->kategori_buku }}</span>
                                <span class="px-4 py-1.5 bg-gray-200 text-gray-700 rounded-full text-sm">{{ $data_produk->kategori_buku }}</span>
                            </div>

                            <p class="text-gray-600 mb-4 flex-1" x-text="book.synopsis"></p>

                            <div class="flex items-center gap-6 mb-4 text-sm text-gray-500">
                                <span class="flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    <span x-text="book.pages + ' pages'"></span>
                                </span>
                                <span class="flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span x-text="book.published"></span>
                                </span>
                            </div>

                            <button
                                class="bg-linear-to-r from-indigo-600 to-purple-600 text-white py-3 px-6 rounded-xl font-semibold hover:from-indigo-700 hover:to-purple-700 transition flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                Read Full Book
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
