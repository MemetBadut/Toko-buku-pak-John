<x-app-layout>

    <body class="bg-linear-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen py-8 px-4">
        <div class="max-w-4xl mx-auto" x-data="{
            formData: {
                title: '',
                author: '',
                isbn: '',
                publisher: '',
                publishDate: '',
                pages: '',
                language: 'Indonesia',
                categories: [],
                description: '',
                coverImage: null,
                pdfFile: null
            },

            categoryOptions: ['Fiction', 'Non-Fiction', 'Fantasy', 'Romance', 'Mystery', 'Thriller', 'Science Fiction', 'Biography', 'History', 'Self-Help', 'Poetry', 'Drama', 'Horror', 'Adventure'],

            coverPreview: null,
            pdfFileName: '',

            toggleCategory(cat) {
                const index = this.formData.categories.indexOf(cat);
                if (index === -1) {
                    if (this.formData.categories.length < 7) {
                        this.formData.categories.push(cat);
                    }
                } else {
                    this.formData.categories.splice(index, 1);
                }
            },

            handleCoverUpload(event) {
                const file = event.target.files[0];
                if (file) {
                    this.formData.coverImage = file;
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.coverPreview = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            },

            handlePdfUpload(event) {
                const file = event.target.files[0];
                if (file) {
                    this.formData.pdfFile = file;
                    this.pdfFileName = file.name;
                }
            },

            removeCover() {
                this.formData.coverImage = null;
                this.coverPreview = null;
                this.$refs.coverInput.value = '';
            },

            removePdf() {
                this.formData.pdfFile = null;
                this.pdfFileName = '';
                this.$refs.pdfInput.value = '';
            },

            submitForm() {
                console.log('Form Data:', this.formData);
                alert('Buku berhasil ditambahkan!\\n\\nJudul: ' + this.formData.title + '\\nPenulis: ' + this.formData.author);
                // Reset form
                this.formData = {
                    title: '',
                    author: '',
                    isbn: '',
                    publisher: '',
                    publishDate: '',
                    pages: '',
                    language: 'Indonesia',
                    categories: [],
                    description: '',
                    coverImage: null,
                    pdfFile: null
                };
                this.coverPreview = null;
                this.pdfFileName = '';
            }
        }">

            <!-- Header -->
            <div class="mb-8 mt-5">
                <a href="{{ route('data_produk.index') }}">
                    <button class="flex items-center gap-2 text-white hover:text-gray-400 transition mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        <span class="font-medium">Kembali</span>
                    </button>
                </a>


                <div class="bg-white rounded-3xl shadow-lg p-6 border-l-4 border-indigo-500">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">📚 Tambah Buku Novel</h1>
                    <p class="text-gray-600">Lengkapi form di bawah untuk menambahkan buku baru ke koleksi</p>
                </div>
            </div>

            <!-- Form -->
            <form @submit.prevent="submitForm" class="space-y-6">

                <!-- Basic Information -->
                <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        Informasi Dasar
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Title -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Judul Buku <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama_penulis" required placeholder="Masukkan judul buku"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        </div>

                        <!-- Author -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Penulis <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama_penulis" required placeholder="Masukkan nama penulis"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        </div>

                        <!-- ISBN -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                ISBN
                            </label>
                            <input type="text" name="isbn_buku" placeholder="978-0-123456-78-9"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        </div>

                        <!-- Publisher -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Penerbit
                            </label>
                            <input type="text" name="nama_penerbit" placeholder="Nama penerbit"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        </div>

                        <!-- Publish Date -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Tanggal Terbit
                            </label>
                            <input type="date" x-model="formData.publishDate"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        </div>

                        <!-- Pages -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Jumlah Halaman
                            </label>
                            <input type="number" name="halaman_buku" placeholder="0" min="1"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        </div>

                        <!-- Language -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Bahasa
                            </label>
                            <select x-model="formData.language"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                <option value="Indonesia">Indonesia</option>
                                <option value="English">English</option>
                                <option value="Mandarin">Mandarin</option>
                                <option value="Japanese">Japanese</option>
                                <option value="Korean">Korean</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Categories -->
                <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        Kategori Buku
                    </h2>
                    <p class="text-sm text-gray-600 mb-4">Pilih maksimal 7 kategori yang sesuai</p>

                    <div class="flex flex-wrap gap-2">
                        <template x-for="cat in categoryOptions" :key="cat">
                            <button type="button" @click="toggleCategory(cat)"
                                :class="formData.categories.includes(cat) ?
                                    'bg-linear-to-r from-indigo-500 to-purple-500 text-white border-transparent' :
                                    'bg-white text-gray-700 border-gray-300 hover:border-indigo-500'"
                                class="px-4 py-2 border-2 rounded-full font-medium transition-all transform hover:scale-105 active:scale-95"
                                x-text="cat"></button>
                        </template>
                    </div>

                    <div class="mt-4 flex items-center gap-2 text-sm">
                        <span class="text-gray-600">Terpilih:</span>
                        <span class="font-bold text-indigo-600" x-text="formData.categories.length + '/7'"></span>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h7" />
                            </svg>
                        </div>
                        Deskripsi & Sinopsis
                    </h2>

                    <textarea x-model="formData.description" rows="6"
                        placeholder="Tulis sinopsis atau deskripsi singkat tentang buku ini..."
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition resize-none"></textarea>

                    <div class="text-sm text-gray-500 mt-2">
                        <span x-text="formData.description.length"></span> karakter
                    </div>
                </div>

                <!-- File Uploads -->
                {{-- <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                        </div>
                        Upload File
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Cover Image -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                Cover Buku <span class="text-red-500">*</span>
                            </label>

                            <div x-show="!coverPreview"
                                class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-indigo-500 transition cursor-pointer"
                                @click="$refs.coverInput.click()">
                                <svg class="w-12 h-12 mx-auto text-gray-400 mb-3" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="text-sm text-gray-600 mb-1">Klik untuk upload cover</p>
                                <p class="text-xs text-gray-500">PNG, JPG max 5MB</p>
                            </div>

                            <div x-show="coverPreview" class="relative" x-cloak>
                                <img :src="coverPreview" class="w-full h-64 object-cover rounded-xl">
                                <button type="button" @click="removeCover"
                                    class="absolute top-2 right-2 w-8 h-8 bg-red-500 text-white rounded-full hover:bg-red-600 transition flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <input type="file" x-ref="coverInput" @change="handleCoverUpload" accept="image/*"
                                class="hidden">
                        </div>

                        <!-- PDF File -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">
                                File PDF Buku <span class="text-red-500">*</span>
                            </label>

                            <div x-show="!pdfFileName"
                                class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-indigo-500 transition cursor-pointer"
                                @click="$refs.pdfInput.click()">
                                <svg class="w-12 h-12 mx-auto text-gray-400 mb-3" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                <p class="text-sm text-gray-600 mb-1">Klik untuk upload PDF</p>
                                <p class="text-xs text-gray-500">PDF max 50MB</p>
                            </div>

                            <div x-show="pdfFileName" class="bg-gray-50 border-2 border-gray-200 rounded-xl p-6"
                                x-cloak>
                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center shrink-0">
                                        <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-semibold text-gray-900 truncate" x-text="pdfFileName">
                                        </p>
                                        <p class="text-xs text-gray-500">PDF Document</p>
                                    </div>
                                    <button type="button" @click="removePdf"
                                        class="text-red-500 hover:text-red-700 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <input type="file" x-ref="pdfInput" @change="handlePdfUpload" accept=".pdf"
                                class="hidden">
                        </div>
                    </div>
                </div> --}}

                <!-- Submit Buttons -->
                <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button type="button"
                            class="flex-1 px-8 py-4 border-2 border-gray-300 text-gray-700 rounded-xl font-bold hover:bg-gray-50 transition-all transform hover:scale-105 active:scale-95">
                            Batal
                        </button>
                        <button type="submit"
                            class="flex-1 px-8 py-4 bg-linear-to-r from-indigo-600 to-purple-600 text-white rounded-xl font-bold hover:from-indigo-700 hover:to-purple-700 transition-all transform hover:scale-105 active:scale-95 shadow-lg flex items-center justify-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span>Tambah Buku</span>
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </body>


</x-app-layout>
