<x-app-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Book | ' .  $data_produk->nama_buku }}
        </h2>
    </x-slot:header>

    <x-bookcard :data-produk="$data_produk" />

</x-app-layout>
