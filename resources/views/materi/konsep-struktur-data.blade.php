@extends('layouts.materi')

@section('title', 'Vilogic - Konsep Struktur Data')

@section('materi_title')
    <h1 class="text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
        Konsep <span class="text-indigo-600">Struktur Data</span>
    </h1>
@endsection

@section('content')
    <div class="mb-12 mt-4">
        <h5 class="text-2xl font-extrabold text-slate-800 mb-6 flex items-center gap-3">
            <i data-lucide="book-open text-indigo-600"></i> Pengertian Struktur Data
        </h5>
        <div class="ml-0 md:ml-10">
            <p class="text-lg text-slate-600 leading-relaxed border-l-4 border-indigo-500 ps-6">
                Struktur data adalah metode untuk mengorganisasikan data di dalam komputer sehingga data dapat diakses, diproses, dan diperbarui secara efisien. Dengan struktur data yang tepat, program menjadi lebih rapi, mudah dikembangkan, dan bekerja lebih cepat.
            </p>
        </div>
    </div>

    <div class="mb-12">
        <h5 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-2">
            <i data-lucide="award" class="text-indigo-600"></i> Fungsi dan Manfaat Struktur Data
        </h5>
        <div class="ml-0 md:ml-10">
            <p class="text-sm text-slate-400 font-bold uppercase tracking-widest mb-6">Struktur data memiliki beberapa fungsi penting:</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @php
                    $manfaat = [
                        'Mengorganisasi data agar tersusun rapi.',
                        'Mempermudah akses data (membaca & mengubah).',
                        'Meningkatkan efisiensi memori dan waktu proses.',
                        'Memudahkan pengembangan program karena alur jelas.',
                        'Mengurangi kesalahan pengolahan data.'
                    ];
                @endphp
                @foreach($manfaat as $m)
                    <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-2xl border border-slate-100 transition hover:border-indigo-200">
                        <i data-lucide="check-circle-2" class="text-indigo-600 w-5 h-5 flex-shrink-0"></i>
                        <span class="text-slate-600 text-sm font-medium">{{ $m }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="mb-12">
        <h5 class="text-xl font-bold text-slate-800 mb-8 flex items-center gap-2">
            <i data-lucide="box" class="text-indigo-600"></i> Jenis Struktur Data
        </h5>
        <div class="ml-0 md:ml-10 space-y-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="p-8 bg-white border border-indigo-50 rounded-[2.5rem] shadow-sm hover:shadow-md transition">
                    <h6 class="font-bold text-indigo-600 mb-3 uppercase tracking-wider text-sm">1) Struktur Data Linear</h6>
                    <p class="text-slate-500 text-sm leading-relaxed mb-4">
                        Elemen disusun secara berurutan atau sejajar. Setiap elemen memiliki satu posisi tertentu dalam urutan tersebut.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-[10px] font-black rounded-full uppercase">List</span>
                        <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-[10px] font-black rounded-full uppercase">Stack</span>
                        <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-[10px] font-black rounded-full uppercase">Queue</span>
                    </div>
                </div>

                <div class="p-8 bg-white border border-indigo-50 rounded-[2.5rem] shadow-sm hover:shadow-md transition">
                    <h6 class="font-bold text-indigo-600 mb-3 uppercase tracking-wider text-sm">2) Struktur Data Non-Linear</h6>
                    <p class="text-slate-500 text-sm leading-relaxed mb-4">
                        Elemen tidak tersusun lurus, melainkan bercabang atau saling terhubung untuk menangani permasalahan yang lebih kompleks.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-slate-50 text-slate-500 text-[10px] font-black rounded-full uppercase">Tree</span>
                        <span class="px-3 py-1 bg-slate-50 text-slate-500 text-[10px] font-black rounded-full uppercase">Graph</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-5 bg-slate-50 rounded-2xl flex items-center gap-4 border border-transparent hover:border-slate-200 transition">
                    <div class="font-black text-indigo-600 text-xs uppercase tracking-tighter bg-white px-3 py-1 rounded-lg shadow-sm">3) Statis</div>
                    <div class="h-6 w-[1px] bg-slate-300"></div>
                    <p class="text-[12px] text-slate-500">Ukuran tetap dan tidak berubah selama digunakan.</p>
                </div>
                <div class="p-5 bg-slate-50 rounded-2xl flex items-center gap-4 border border-transparent hover:border-slate-200 transition">
                    <div class="font-black text-indigo-600 text-xs uppercase tracking-tighter bg-white px-3 py-1 rounded-lg shadow-sm">4) Dinamis</div>
                    <div class="h-6 w-[1px] bg-slate-300"></div>
                    <p class="text-[12px] text-slate-500">Ukuran dapat berubah (tambah/kurang) sesuai kebutuhan.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-12">
        <h5 class="text-xl font-bold text-slate-800 mb-8 flex items-center gap-2">
            <i data-lucide="zap" class="text-indigo-600"></i> Karakteristik Struktur Data yang Baik
        </h5>
        <div class="ml-0 md:ml-10 grid grid-cols-2 md:grid-cols-4 gap-4">
            @php
                $chars = [
                    ['icon' => 'layout-grid', 'title' => 'Teratur'],
                    ['icon' => 'zap', 'title' => 'Efisien'],
                    ['icon' => 'unlock', 'title' => 'Mudah Diakses'],
                    ['icon' => 'target', 'title' => 'Sesuai Kebutuhan']
                ];
            @endphp
            @foreach($chars as $c)
                <div class="p-6 bg-white border border-slate-100 rounded-3xl text-center shadow-sm hover:shadow-md transition group">
                    <div class="text-indigo-600 mb-3 flex justify-center group-hover:scale-110 transition-transform">
                        <i data-lucide="{{ $c['icon'] }}"></i>
                    </div>
                    <span class="text-xs font-bold text-slate-700 uppercase tracking-wider">{{ $c['title'] }}</span>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mb-12">
        <h5 class="text-xl font-extrabold text-slate-800 mb-8 flex items-center gap-2 border-b border-slate-100 pb-4">
            <i data-lucide="code-2" class="text-indigo-600"></i> Struktur Data dengan Python
        </h5>
        
        <div class="ml-0 md:ml-10 space-y-12">
            <div class="relative pl-0 md:pl-16">
                <div class="hidden md:flex absolute left-0 top-0 text-indigo-600 bg-indigo-50 p-3 rounded-2xl border border-indigo-100">
                    <i data-lucide="list-ordered" class="w-6 h-6"></i>
                </div>
                <h6 class="text-lg font-bold text-slate-800 mb-3 flex items-center gap-2">
                    <span class="md:hidden text-indigo-600 font-black">1.</span> List
                </h6>
                <p class="text-slate-600 text-base leading-relaxed">
                    List merupakan struktur data linear yang digunakan untuk menyimpan sekumpulan data dalam satu variabel. Data pada list disusun secara berurutan dan dapat diakses menggunakan indeks. List dalam Python bersifat dinamis sehingga jumlah elemennya dapat bertambah atau berkurang sesuai kebutuhan program. List banyak digunakan untuk menyimpan kumpulan data seperti daftar nama, nilai, atau data layanan dalam suatu sistem.
                </p>
            </div>

            <div class="relative pl-0 md:pl-16">
                <div class="hidden md:flex absolute left-0 top-0 text-indigo-600 bg-indigo-50 p-3 rounded-2xl border border-indigo-100">
                    <i data-lucide="users" class="w-6 h-6"></i>
                </div>
                <h6 class="text-lg font-bold text-slate-800 mb-3 flex items-center gap-2">
                    <span class="md:hidden text-indigo-600 font-black">2.</span> Queue (Antrean)
                </h6>
                <div class="space-y-4">
                    <p class="text-slate-600 text-base leading-relaxed">
                        Queue merupakan struktur data yang menerapkan prinsip <strong>FIFO (First In First Out)</strong>, yaitu data yang pertama masuk akan menjadi data pertama yang keluar. Prinsip ini meniru sistem antrean dalam kehidupan sehari-hari, seperti antrean murid di Tata Usaha, di mana murid yang datang lebih dulu akan dilayani lebih dulu.
                    </p>
                    <p class="text-slate-600 text-base leading-relaxed bg-slate-50 p-6 rounded-2xl border-l-4 border-indigo-300">
                        Dalam Python, queue dapat direpresentasikan menggunakan list. Proses menambahkan data disebut <strong>enqueue</strong>, sedangkan mengeluarkan data disebut <strong>dequeue</strong>. Penambahan data dilakukan di bagian belakang, sedangkan penghapusan dilakukan dari bagian depan. Struktur ini sangat sesuai untuk sistem pelayanan dan pengelolaan antrean.
                    </p>
                </div>
            </div>

            <div class="relative pl-0 md:pl-16">
                <div class="hidden md:flex absolute left-0 top-0 text-indigo-600 bg-indigo-50 p-3 rounded-2xl border border-indigo-100">
                    <i data-lucide="layers-2" class="w-6 h-6"></i>
                </div>
                <h6 class="text-lg font-bold text-slate-800 mb-3 flex items-center gap-2">
                    <span class="md:hidden text-indigo-600 font-black">3.</span> Stack (Tumpukan)
                </h6>
                <div class="space-y-4">
                    <p class="text-slate-600 text-base leading-relaxed">
                        Stack merupakan struktur data yang menerapkan prinsip <strong>LIFO (Last In First Out)</strong>, yaitu data yang terakhir masuk akan menjadi data pertama yang keluar. Prinsip ini dianalogikan seperti tumpukan buku, di mana buku yang terakhir diletakkan di atas akan menjadi buku pertama yang diambil.
                    </p>
                    <p class="text-slate-600 text-base leading-relaxed bg-slate-50 p-6 rounded-2xl border-l-4 border-indigo-300">
                        Dalam Python, stack direpresentasikan menggunakan list. Proses menambah data disebut <strong>push</strong>, dan mengeluarkan data disebut <strong>pop</strong>. Keduanya dilakukan pada bagian yang sama, yaitu bagian atas tumpukan. Struktur ini sering digunakan untuk mekanisme <strong>undo</strong> atau riwayat aktivitas.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-20 pt-10 border-t border-slate-100 flex flex-col md:flex-row items-center justify-between gap-6">
        <a href="{{ url('/materi/pengantar-struktur-data') }}" class="group text-slate-400 hover:text-indigo-600 font-bold flex items-center gap-2 transition">
            <i data-lucide="arrow-left" class="w-5 h-5 group-hover:-translate-x-1 transition-transform"></i> Kembali ke Pengantar
        </a>
         <a href="{{ url('/materi/materi-list') }}" class="group flex items-center gap-3 bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-2xl font-bold transition-all shadow-lg shadow-indigo-200">
            Lanjut ke Materi List
            <i data-lucide="arrow-right" class="group-hover:translate-x-1 transition-transform"></i>
        </a>
    </div>
@endsection