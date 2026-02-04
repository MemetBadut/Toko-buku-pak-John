<x-app-layout>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                📚 | Buku Toko Jhon
            </h2>
        </div>
    </div>

    {{-- Tabel Data --}}
    <div class="max-w-6xl mx-auto space-y-12 mt-5">
        <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-5 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    {{-- Searchbar start --}}
                    <form action="{{ route('produk_buku.index') }}" method="GET">
                        <div class="flex items-center gap-3 bg-white rounded-2xl shadow-xl border border-gray-100 p-2">
                            <div class="relative flex-1">
                                <input type="text" name="search" placeholder="What are you looking for?"
                                    class="w-full px-4 py-2 pl-11 bg-transparent focus:outline-none text-sm">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2
                                        11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146
                                        18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748
                                        16.0247L16.0247 15.8748Z">
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
                        <a href="{{ route('admin.produk_buku.create') }}"
                            class="flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-0.5 -0.5 16 16"
                                stroke="currentColor" height="18" width="18">
                                <path d="M11.25 7.5h-3.75m0 0H3.75m3.75 0V3.75m0 3.75v3.75" stroke-width="1"></path>
                            </svg>
                            <span class="text-sm font-medium">Tambah Buku</span>
                        </a>
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
                                class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Action</th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @php $i = 1 @endphp
                        @foreach ($data_buku as $buku)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-center text-gray-600">{{ $i }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <span class="font-medium text-gray-900">{{ $buku->nama_buku }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center text-sm text-gray-600">{{ $buku->nama_penulis }}</td>
                                <td class="px-6 py-4 text-center text-sm text-gray-600 ">
                                    <div class="flex flex-wrap justify-center gap-2">
                                        @foreach ($buku->kategoriBuku as $kate)
                                            <span
                                                class="px-2.5 py-1 bg-linear-to-r from-indigo-500 to-purple-500 text-white rounded-md text-xs font-medium shadow-sm">
                                                {{ $kate->kategori_buku }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center text-sm text-gray-600">
                                    <div class="flex items-center justify-center gap-1">
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <span
                                            class="text-sm font-semibold text-gray-900">{{ $buku->rating_buku }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <a href="{{ route('produk_buku.show', $buku->id) }}"
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
                            @php $i++ @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Footer / Pagination -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
                <div class="text-sm text-gray-600">
                    {{ $data_buku->firstItem() }} - {{ $data_buku->lastItem() }} of {{ $data_buku->total() }} Books
                </div>
                <div class="flex items-center gap-2">
                    <button>{{ $data_buku->links() }}</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
