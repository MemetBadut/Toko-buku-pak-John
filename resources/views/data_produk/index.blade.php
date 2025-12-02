<x-app-layout>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Kumpulan Buku
            </h2>
        </div>
    </div>

    {{-- Tabel Data --}}
    <div class="max-w-6xl mx-auto space-y-12 mt-6">
        <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-5 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">📚Daftar Buku</h2>
                        <p class="text-sm text-gray-500 mt-1">Tabel Buku Toko Jhon</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('data_produk.create') }}" class="inline-block">
                            <button
                                class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-0.5 -0.5 16 16"
                                    stroke-linecap="round" stroke-linejoin="round" stroke="#000000"
                                    id="Plus--Streamline-Mynaui" height="22" width="22">
                                    <desc>
                                        Plus Streamline Icon: https://streamlinehq.com
                                    </desc>
                                    <path d="M11.25 7.5h-3.75m0 0H3.75m3.75 0V3.75m0 3.75v3.75" stroke-width="1"></path>
                                </svg>
                                <span class="text-sm font-medium text-gray-700">Tambah Buku</span>
                            </button>
                        </a>
                        <div x-data="{ dropdownOpen: false }">
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
                                class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl" x-cloak>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Option1</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Option1</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Option1</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
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
                                class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($data_buku as $buku)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-center     text-gray-600">{{ $buku->id }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <span class="font-medium text-gray-900">{{ $buku->nama_buku }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center text-sm text-gray-600">{{ $buku->nama_penulis }}</td>
                                <td class="px-6 py-4 text-center text-sm text-gray-600">{{ $buku->kategori_buku }}</td>
                                <td class="px-6 py-4 text-center text-sm text-gray-600">{{ $buku->rating_buku }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('data_produk.show', $buku->id) }}" class="inline-block">
                                        <button class="text-gray-400 hover:text-gray-600 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                height="24" fill="currentColor">
                                                <path
                                                    d="M13 21V23H11V21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H9C10.1947 3 11.2671 3.52375 12 4.35418C12.7329 3.52375 13.8053 3 15 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H13ZM20 19V5H15C13.8954 5 13 5.89543 13 7V19H20ZM11 19V7C11 5.89543 10.1046 5 9 5H4V19H11Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Footer / Pagination -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
                <div class="text-sm text-gray-600">
                    1 - 4 of 8 Books
                </div>
                <div class="flex items-center gap-2">
                    <button
                        class="px-3 py-1 text-sm text-gray-600 hover:text-gray-900 transition flex items-center gap-1">
                        <span>1 - 4</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <button
                        class="px-4 py-2 text-sm text-gray-600 hover:bg-gray-100 rounded-lg transition">Previous</button>
                    <button
                        class="px-4 py-2 text-sm text-gray-600 hover:bg-gray-100 rounded-lg transition">Next</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
