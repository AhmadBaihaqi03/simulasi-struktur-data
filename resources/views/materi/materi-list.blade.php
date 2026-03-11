@extends('layouts.materi')

@section('title', 'Vilogic - Materi List')

@section('materi_title')
    <h1 class="text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
        Struktur Data <span class="text-indigo-600">List</span>
    </h1>
@endsection

@section('content')
    <div class="mb-12 mt-4">
        <h5 class="text-2xl font-bold text-slate-800 mb-6 flex items-center gap-3">
            <i data-lucide="info" class="text-indigo-600"></i> Apa itu List?
        </h5>
        <div class="ml-0 md:ml-10">
            <p class="text-lg text-slate-600 leading-relaxed border-l-4 border-indigo-500 ps-6">
                List adalah struktur data linear yang digunakan untuk menyimpan sekumpulan data dalam satu variabel. Data pada list tersusun secara berurutan dan setiap elemen memiliki posisi tertentu yang disebut <strong class="text-indigo-600">indeks</strong>.
            </p>
            
            <div class="bg-indigo-50 p-6 rounded-2xl mt-8 border border-indigo-100 flex gap-4 items-start">
                <div class="bg-indigo-600 p-2 rounded-lg shrink-0">
                    <i data-lucide="lightbulb" class="text-white w-4 h-4"></i>
                </div>
                <p class="text-sm text-indigo-900 leading-relaxed">
                    <strong>Penting:</strong> Dalam Python, indeks dimulai dari angka <strong>0</strong>. Elemen pertama berada pada indeks ke-0, kedua pada indeks ke-1, dan seterusnya.
                </p>
            </div>
        </div>
    </div>

    <div class="mb-16">
        <h5 class="text-xl font-bold text-slate-800 mb-8 flex items-center gap-2">
            <i data-lucide="layers" class="text-indigo-600"></i> Operasi Dasar List
        </h5>
        
        <div class="ml-0 md:ml-10 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="group p-6 bg-white border border-slate-100 rounded-[2rem] hover:shadow-xl hover:border-indigo-100 transition-all duration-300">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i data-lucide="plus-circle"></i>
                </div>
                <h6 class="font-bold text-slate-800 mb-2">1. Insert (Tambah)</h6>
                <p class="text-slate-500 text-sm leading-relaxed">Menambahkan elemen baru ke dalam list, baik di akhir maupun pada posisi tertentu.</p>
            </div>

            <div class="group p-6 bg-white border border-slate-100 rounded-[2rem] hover:shadow-xl hover:border-indigo-100 transition-all duration-300">
                <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i data-lucide="trash-2"></i>
                </div>
                <h6 class="font-bold text-slate-800 mb-2">2. Delete (Hapus)</h6>
                <p class="text-slate-500 text-sm leading-relaxed">Menghapus elemen dari list berdasarkan posisi (indeks) atau nilai tertentu.</p>
            </div>

            <div class="group p-6 bg-white border border-slate-100 rounded-[2rem] hover:shadow-xl hover:border-indigo-100 transition-all duration-300">
                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i data-lucide="edit-3"></i>
                </div>
                <h6 class="font-bold text-slate-800 mb-2">3. Update (Ubah)</h6>
                <p class="text-slate-500 text-sm leading-relaxed">Mengubah nilai elemen yang sudah ada pada indeks tertentu dengan nilai baru.</p>
            </div>

            <div class="group p-6 bg-white border border-slate-100 rounded-[2rem] hover:shadow-xl hover:border-indigo-100 transition-all duration-300">
                <div class="w-12 h-12 bg-sky-50 text-sky-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i data-lucide="eye"></i>
                </div>
                <h6 class="font-bold text-slate-800 mb-2">4. Traversal (Telusur)</h6>
                <p class="text-slate-500 text-sm leading-relaxed">Menampilkan atau membaca seluruh elemen dalam list secara berurutan.</p>
            </div>
        </div>
    </div>

    <div class="mb-16 bg-slate-900 rounded-[3rem] p-8 md:p-12 text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-500/10 rounded-full -mr-20 -mt-20 blur-3xl"></div>
        
        <div class="relative z-10">
            <h5 class="text-2xl font-bold mb-6 flex items-center gap-3">
                <i data-lucide="help-circle" class="text-indigo-400"></i> Mengapa Menggunakan List?
            </h5>
            <p class="text-slate-300 text-lg leading-relaxed mb-0">
                List bersifat <span class="text-indigo-400 font-bold italic">dinamis</span>, sehingga jumlah elemennya dapat bertambah atau berkurang sesuai kebutuhan program. Di sekolah, ini sangat berguna untuk menyimpan daftar nama murid atau antrean layanan TU yang jumlahnya selalu berubah setiap saat.
            </p>
        </div>
    </div>

    <div class="mt-20 pt-10 border-t border-slate-100 flex flex-col md:flex-row items-center justify-between gap-6">
        <a href="{{ url('/materi/operasi-list-python') }}" class="group text-slate-400 hover:text-indigo-600 font-bold flex items-center gap-2 transition">
            <i data-lucide="arrow-left" class="w-5 h-5 group-hover:-translate-x-1 transition-transform"></i> Kembali ke Operasi List
        </a>
         <a href="{{ url('/materi/simulasi-queue') }}" class="group flex items-center gap-3 bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-2xl font-bold transition-all shadow-lg shadow-indigo-200">
            Lanjut ke Simulasi Queue
            <i data-lucide="arrow-right" class="group-hover:translate-x-1 transition-transform"></i>
        </a>
    </div>
@endsection