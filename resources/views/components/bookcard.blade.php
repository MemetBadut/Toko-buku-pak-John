<body class="bg-linear-to-br from-gray-50 via-blue-50 to-purple-50 min-h-screen">
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <div class="min-h-screen py-8 px-4" x-data="{
        book: {
            title: 'The Midnight Library',
            author: 'Matt Haig',
            cover: 'https://images.unsplash.com/photo-1543002588-bfa74002ed7e?w=400&h=600&fit=crop',
            rating: 4.8,
            totalRatings: 12547,
            categories: ['Fiction', 'Fantasy', 'Philosophy', 'Drama', 'Contemporary', 'Literature', 'Mental Health'],
            publishDate: '2020-08-13',
            pages: 304,
            language: 'English',
            isbn: '978-0525559474',
            publisher: 'Viking Press',
            description: 'Between life and death there is a library, and within that library, the shelves go on forever. Every book provides a chance to try another life you could have lived. To see how things would be if you had made other choices... Would you have done anything different, if you had the chance to undo your regrets?',
            authorVotes: 8934,
            hasVoted: false,
            userRating: 0
        },

        showRatingModal: false,
        hoverRating: 0,

        submitRating() {
            if (this.book.userRating > 0) {
                alert('Rating berhasil: ' + this.book.userRating + ' bintang');
                this.showRatingModal = false;
            }
        },

        voteAuthor() {
            if (!this.book.hasVoted) {
                this.book.hasVoted = true;
                this.book.authorVotes++;
                alert('Vote untuk penulis berhasil!');
            } else {
                this.book.hasVoted = false;
                this.book.authorVotes--;
                alert('Vote dibatalkan');
            }
        },

        formatDate(dateString) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('id-ID', options);
        },
    }">

        <!-- Back Button -->
        <div class="max-w-6xl mx-auto mb-6">
            <a href="{{ route('data_produk.index') }}">
                <button class="flex items-center gap-2 text-white hover:text-gray-400 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="font-medium">Kembali</span>
                </button>
            </a>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 p-8">

                <!-- Left Column - Book Cover -->
                <div class="lg:col-span-1">
                    <div class="sticky top-8">
                        <!-- Book Cover -->
                        <div
                            class="aspect-2/3 rounded-2xl overflow-hidden shadow-2xl mb-6 transform hover:scale-105 transition-transform duration-300">
                            <img :src="book.cover" :alt="book.title" class="w-full h-full object-cover">
                        </div>

                        <!-- Author Vote Section -->
                        <div class="bg-linear-to-br from-purple-50 to-blue-50 rounded-2xl p-6 border border-purple-100">
                            <div class="flex items-center gap-3 mb-4">
                                <div
                                    class="w-12 h-12 bg-linear-to-br from-purple-500 to-blue-500 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Penulis</p>
                                    <p class="font-bold text-gray-900">{{ $data_produk->nama_penulis }}</p>
                                </div>
                            </div>

                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-2xl font-bold text-gray-900"
                                        x-text="book.authorVotes.toLocaleString()"></p>
                                    <p class="text-sm text-gray-600">Total Vote</p>
                                </div>
                                <button @click="voteAuthor"
                                    :class="book.hasVoted ? 'bg-linear-to-r from-purple-600 to-blue-600 text-white' :
                                        'bg-white text-gray-700 border-2 border-gray-300'"
                                    class="flex items-center gap-2 px-6 py-3 rounded-xl font-semibold transition-all transform hover:scale-105 active:scale-95">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                    </svg>
                                    <span x-text="book.hasVoted ? 'Voted' : 'Vote'"></span>
                                </button>
                            </div>

                            <p class="text-xs text-gray-500 text-center">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Vote untuk mendukung penulis favorit Anda
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Book Details -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- Title & Author -->
                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-3">{{ $data_produk->nama_buku }}</h1>
                        <p class="text-xl text-gray-600 mb-4">
                            by <span class="font-semibold text-gray-900">{{ $data_produk->nama_penulis }}</span>
                        </p>
                    </div>

                    <!-- Rating & Date -->
                    <div class="flex flex-wrap items-center gap-6 pb-6 border-b border-gray-200">
                        <!-- Rating -->
                        <div class="flex items-center gap-3">
                            <div class="flex items-center gap-1">
                                <template x-for="i in 5" :key="i">
                                    <svg :class="i <= Math.floor(book.rating) ? 'text-yellow-400' : 'text-gray-300'"
                                        class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </template>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-gray-900" x-text="book.rating"></p>
                                <p class="text-sm text-gray-500"
                                    x-text="book.totalRatings.toLocaleString() + ' ratings'"></p>
                            </div>
                        </div>

                        <!-- Publish Date -->
                        <div>
                            <p class="text-sm text-gray-500">Published</p>
                            <p class="font-semibold text-gray-900">{{ $data_produk->tanggal_publish }}</p>
                        </div>

                        <!-- Pages -->
                        <div>
                            <p class="text-sm text-gray-500">Pages</p>
                            <p class="font-semibold text-gray-900">{{ $data_produk->halaman_buku }}</p>
                        </div>

                        <!-- Language -->
                        <div>
                            <p class="text-sm text-gray-500">Language</p>
                            <p class="font-semibold text-gray-900" x-text="book.language"></p>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div>
                        <h3 class="text-sm font-semibold text-gray-700 mb-3 uppercase tracking-wide">Categories</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($data_produk->KategoriBuku as $kat)
                                <span
                                    class="px-4 py-2 bg-linear-to-r from-indigo-500 to-purple-500
                                text-white rounded-full text-sm font-medium hover:from-indigo-600 hover:to-purple-600
                                transition-all transform hover:scale-105 cursor-pointer">
                                {{ $kat->kategori_buku }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">About This Book</h3>
                        <p class="text-gray-700 leading-relaxed text-lg">{{ $data_produk->slug }}</p>
                    </div>

                    <!-- Book Details -->
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Book Details</h3>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <p class="text-gray-600">ISBN</p>
                                <p class="font-semibold text-gray-900">{{ $data_produk->isbn }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Publisher</p>
                                <p class="font-semibold text-gray-900">{{ $data_produk->publisher }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Format</p>
                                <p class="font-semibold text-gray-900">Paperback</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Language</p>
                                <p class="font-semibold text-gray-900" x-text="book.language"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="sticky bottom-0 bg-white pt-6 pb-2 border-t border-gray-200 -mx-8 px-8">
                        <div class="flex flex-col sm:flex-row gap-4">
                            <!-- Read Book Button -->
                            <button
                                class="flex-1 bg-linear-to-r from-indigo-600 to-purple-600 text-white py-4 px-8 rounded-xl font-bold text-lg hover:from-indigo-700 hover:to-purple-700 transition-all transform hover:scale-105 active:scale-95 flex items-center justify-center gap-3 shadow-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                <span>Baca Buku</span>
                            </button>

                            <!-- Rate This Book Button -->
                            <button @click="showRatingModal = true"
                                class="flex-1 sm:flex-none bg-white border-2 border-indigo-600 text-indigo-600 py-4 px-8 rounded-xl font-bold text-lg hover:bg-indigo-50 transition-all transform hover:scale-105 active:scale-95 flex items-center justify-center gap-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                                <span>Beri Rating</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Rating Modal -->
        <div x-show="showRatingModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4" x-cloak>
            <div @click.away="showRatingModal = false" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="bg-white rounded-3xl shadow-2xl max-w-md w-full p-8">
                <div class="text-center mb-6">
                    <div
                        class="w-16 h-16 bg-linear-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Beri Rating Buku</h2>
                    <p class="text-gray-600">{{ $data_produk->nama_buku }}</p>
                </div>

                <!-- Star Rating -->
                <div class="flex justify-center gap-2 mb-6">
                    <template x-for="i in 5" :key="i">
                        <button @click="book.userRating = i" @mouseenter="hoverRating = i"
                            @mouseleave="hoverRating = 0"
                            class="transform transition-all hover:scale-125 active:scale-110">
                            <svg :class="i <= (hoverRating || book.userRating) ? 'text-yellow-400' : 'text-gray-300'"
                                class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </button>
                    </template>
                </div>

                <p class="text-center text-lg font-semibold text-gray-900 mb-6" x-show="book.userRating > 0">
                    Rating Anda: <span class="text-yellow-500" x-text="book.userRating"></span> bintang
                </p>

                <!-- Buttons -->
                <div class="flex gap-3">
                    <button @click="showRatingModal = false"
                        class="flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition">
                        Batal
                    </button>
                    <button @click="submitRating" :disabled="book.userRating === 0"
                        :class="book.userRating === 0 ? 'opacity-50 cursor-not-allowed' :
                            'hover:from-indigo-700 hover:to-purple-700'"
                        class="flex-1 px-6 py-3 bg-linear-to-r from-indigo-600 to-purple-600 text-white rounded-xl font-semibold transition">
                        Kirim Rating
                    </button>
                </div>
            </div>
        </div>

    </div>

</body>
