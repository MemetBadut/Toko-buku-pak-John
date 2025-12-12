<x-app-layout>
    <div class="max-w-6xl mx-auto space-y-12 mt-5" x-data="{
        sortBy: '{{ request('sort', 'id') }}',
        sortOrder: '{{ request('order', 'asc') }}',

        sort(field) {
            if (this.sortBy === field) {
                this.sortOrder = this.sortOrder === 'asc' ? 'desc' : 'asc';
            } else {
                this.sortBy = field;
                this.sortOrder = 'asc';
            }

            const url = new URL(window.location.href);
            url.searchParams.set('sort', this.sortBy);
            url.searchParams.set('order', this.sortOrder);
            window.location.href = url.toString();
        }
    }">
        <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-lg">
            <!-- Header -->
            <div class="px-6 py-5 border-b border-gray-200">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    {{-- Searchbar start --}}
                    <form action="{{ route('data_produk.index') }}" method="GET" class="w-full md:w-auto">
                        <!-- Keep sort params in search -->
                        <input type="hidden" name="sort" :value="sortBy">
                        <input type="hidden" name="order" :value="sortOrder">

                        <div class="flex items-center gap-3 bg-white rounded-2xl shadow-xl border border-gray-100 p-2">
                            <div class="relative flex-1">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="What are you looking for?"
                                    class="w-full px-4 py-2 pl-11 bg-transparent focus:outline-none text-sm">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z">
                                    </path>
                                </svg>
                            </div>
                            <button type="submit"
                                class="bg-linear-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white px-6 py-2 rounded-xl font-semibold transition-all">
                                Search
                            </button>
                        </div>
                    </form>
                    {{-- Search bar end --}}

                    <div class="flex items-center gap-3">
                        <!-- Sort Dropdown -->
                        <div class="relative" x-data="{ sortDropdown: false }">
                            <button @click="sortDropdown = !sortDropdown"
                                class="flex items-center gap-2 px-4 py-2 bg-white border-2 border-gray-300 rounded-lg hover:border-indigo-500 transition">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
                                </svg>
                                <span class="text-sm font-medium text-gray-700">Sort By</span>
                                <svg :class="sortDropdown ? 'rotate-180' : ''"
                                    class="w-4 h-4 text-gray-600 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-show="sortDropdown" @click.away="sortDropdown = false" x-transition
                                class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-2xl border border-gray-200 py-2 z-50"
                                x-cloak>
                                <button @click="sort('id'); sortDropdown = false"
                                    :class="sortBy === 'id' ? 'bg-indigo-50 text-indigo-600' :
                                        'text-gray-700 hover:bg-gray-50'"
                                    class="w-full flex items-center justify-between px-4 py-3 text-sm transition">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                        </svg>
                                        ID Number
                                    </span>
                                    <svg x-show="sortBy === 'id' && sortOrder === 'asc'" class="w-4 h-4" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7" />
                                    </svg>
                                    <svg x-show="sortBy === 'id' && sortOrder === 'desc'" class="w-4 h-4" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <button @click="sort('nama_buku'); sortDropdown = false"
                                    :class="sortBy === 'nama_buku' ? 'bg-indigo-50 text-indigo-600' :
                                        'text-gray-700 hover:bg-gray-50'"
                                    class="w-full flex items-center justify-between px-4 py-3 text-sm transition">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                        Book Title (A-Z)
                                    </span>
                                    <svg x-show="sortBy === 'nama_buku' && sortOrder === 'asc'" class="w-4 h-4"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7" />
                                    </svg>
                                    <svg x-show="sortBy === 'nama_buku' && sortOrder === 'desc'" class="w-4 h-4"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <button @click="sort('nama_penulis'); sortDropdown = false"
                                    :class="sortBy === 'nama_penulis' ? 'bg-indigo-50 text-indigo-600' :
                                        'text-gray-700 hover:bg-gray-50'"
                                    class="w-full flex items-center justify-between px-4 py-3 text-sm transition">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Author Name (A-Z)
                                    </span>
                                    <svg x-show="sortBy === 'nama_penulis' && sortOrder === 'asc'" class="w-4 h-4"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7" />
                                    </svg>
                                    <svg x-show="sortBy === 'nama_penulis' && sortOrder === 'desc'" class="w-4 h-4"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <button @click="sort('rating_buku'); sortDropdown = false"
                                    :class="sortBy === 'rating_buku' ? 'bg-indigo-50 text-indigo-600' :
                                        'text-gray-700 hover:bg-gray-50'"
                                    class="w-full flex items-center justify-between px-4 py-3 text-sm transition">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        Rating (High-Low)
                                    </span>
                                    <svg x-show="sortBy === 'rating_buku' && sortOrder === 'asc'" class="w-4 h-4"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7" />
                                    </svg>
                                    <svg x-show="sortBy === 'rating_buku' && sortOrder === 'desc'" class="w-4 h-4"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <button @click="sort('created_at'); sortDropdown = false"
                                    :class="sortBy === 'created_at' ? 'bg-indigo-50 text-indigo-600' :
                                        'text-gray-700 hover:bg-gray-50'"
                                    class="w-full flex items-center justify-between px-4 py-3 text-sm transition">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Date Added (Newest)
                                    </span>
                                    <svg x-show="sortBy === 'created_at' && sortOrder === 'asc'" class="w-4 h-4"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7" />
                                    </svg>
                                    <svg x-show="sortBy === 'created_at' && sortOrder === 'desc'" class="w-4 h-4"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <a href="{{ route('data_produk.create') }}"
                            class="flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-0.5 -0.5 16 16"
                                stroke="currentColor" height="18" width="18">
                                <path d="M11.25 7.5h-3.75m0 0H3.75m3.75 0V3.75m0 3.75v3.75" stroke-width="1"></path>
                            </svg>
                            <span class="text-sm font-medium">Tambah Buku</span>
                        </a>

                        <div class="relative" x-data="{ dropdownOpen: false }">
                            <button
                                class="p-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-all hover:border-gray-400"
                                @click='dropdownOpen = !dropdownOpen'>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                    height="24" fill="currentColor" :class="dropdownOpen ? 'rotate-180' : ''"
                                    class="transition-transform duration-300 ease-in-out text-gray-600">
                                    <path
                                        d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z">
                                    </path>
                                </svg>
                            </button>
                            <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-transition
                                class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border z-50" x-cloak>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg">Export
                                    PDF</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Export Excel</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 rounded-b-lg">Print</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Sort Indicator -->
                <div x-show="sortBy !== 'id' || sortOrder !== 'asc'" class="mt-4 flex items-center gap-2" x-cloak>
                    <span class="text-sm text-gray-600">Sorting by:</span>
                    <span
                        class="inline-flex items-center gap-2 px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm font-medium">
                        <span x-text="sortBy.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase())"></span>
                        <span x-text="sortOrder === 'asc' ? '↑' : '↓'"></span>
                        <button
                            @click="sortBy = 'id'; sortOrder = 'asc'; window.location.href = '{{ route('data_produk.index') }}'"
                            class="text-indigo-900 hover:text-indigo-700">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </span>
                </div>
            </div>

            <!-- Table (rest remains the same) -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th
                                class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                No</th>
                            <th
                                class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Judul Buku</th>
                            <th
                                class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nama Penulis</th>
                            <th
                                class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Kategori Buku</th>
                            <th
                                class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Rating Buku</th>
                            <th
                                class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($data_test as $buku)
                            <tr class="hover:bg-indigo-50/50 transition">
                                <td class="px-6 py-4 text-sm text-center text-gray-600">{{ $buku->id }}</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="font-semibold text-gray-900">{{ $buku->nama_buku }}</span>
                                </td>
                                <td class="px-6 py-4 text-center text-sm text-gray-600">{{ $buku->nama_penulis }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="flex flex-wrap justify-center gap-1.5">
                                        @foreach ($buku->kategoriBuku as $kate)
                                            <span
                                                class="px-2.5 py-1 bg-linear-to-r from-indigo-500 to-purple-500 text-white rounded-md text-xs font-medium shadow-sm">
                                                {{ $kate->kategori_buku }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1">
                                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <span class="text-sm font-bold text-gray-900">{{ $buku->rating_buku }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('data_produk.show', $buku->id) }}"
                                            class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <a class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Footer / Pagination -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
                <div class="text-sm text-gray-600">
                    {{ $data_test->firstItem() }} - {{ $data_test->lastItem() }} of {{ $data_test->total() }} Books
                </div>
                <div class="flex items-center gap-2">
                    {{ $data_test->appends(['sort' => request('sort'), 'order' => request('order'), 'search' => request('search')])->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
