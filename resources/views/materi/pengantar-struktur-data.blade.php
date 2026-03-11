@extends('layouts.materi')

@section('title', 'Vilogic - Pengantar Struktur Data')

@section('materi_title')
    <h1 class="text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
        Pengantar <span class="text-indigo-600">Struktur Data</span>
    </h1>
@endsection

@section('content')
    <div class="mb-10">
        <p class="text-xl text-slate-600 border-l-4 border-indigo-600 ps-6 italic">
            Pernahkah kamu memperhatikan bagaimana kesibukan di ruang Tata Usaha (TU) sekolah? Ternyata, aktivitas sehari-hari di sana sangat berkaitan erat dengan konsep pemrograman.
        </p>
    </div>

    <div class="mb-12">
        <h5 class="flex items-center gap-3">
            <i data-lucide="book-marked" class="text-indigo-600"></i> Studi Kasus: Tata Usaha Sekolah
        </h5>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100 hover:shadow-lg transition-all duration-300">
                <i data-lucide="user-plus" class="text-slate-400 mb-4 w-8 h-8"></i>
                <h6 class="font-bold text-slate-800 mb-2">Pencatatan</h6>
                <p class="text-sm text-slate-500">Mendata setiap murid yang datang untuk keperluan administrasi.</p>
            </div>
            <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100 hover:shadow-lg transition-all duration-300">
                <i data-lucide="timer" class="text-slate-400 mb-4 w-8 h-8"></i>
                <h6 class="font-bold text-slate-800 mb-2">Antrean</h6>
                <p class="text-sm text-slate-500">Mengatur urutan pelayanan agar tetap tertib dan adil.</p>
            </div>
            <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100 hover:shadow-lg transition-all duration-300">
                <i data-lucide="edit-3" class="text-slate-400 mb-4 w-8 h-8"></i>
                <h6 class="font-bold text-slate-800 mb-2">Koreksi</h6>
                <p class="text-sm text-slate-500">Memperbaiki kesalahan input data jika terjadi kekeliruan.</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
        <div class="p-6 bg-red-50 border-l-4 border-red-500 rounded-r-2xl">
            <h6 class="font-bold text-red-700 flex items-center gap-2 mb-2 text-sm">
                <i data-lucide="x-circle" class="w-4 h-4"></i> Masalah Manual
            </h6>
            <p class="text-xs text-red-600/80">Antrean tidak tertib, risiko data ganda, dan sulit melacak riwayat.</p>
        </div>
        <div class="p-6 bg-green-50 border-l-4 border-green-500 rounded-r-2xl">
            <h6 class="font-bold text-green-700 flex items-center gap-2 mb-2 text-sm">
                <i data-lucide="check-circle" class="w-4 h-4"></i> Solusi Digital
            </h6>
            <p class="text-xs text-green-600/80">Struktur data memungkinkan penyimpanan rapi dan efisiensi memori.</p>
        </div>
    </div>

    <p class="text-slate-600 leading-relaxed border-l-4 border-indigo-600 ps-6">
        Di sini, kita akan mempelajari <b>List, Stack, dan Queue</b> dengan menggunakan bahasa <b>Python</b>. 
        Ketiganya akan kita gunakan untuk membuat sistem antrean yang rapi dan efisien. Yuk, kita mulai!
    </p>

    <div class="mt-12 pt-8 border-t border-slate-100 flex justify-end">
        <a href="{{ url('/materi/konsep-struktur-data') }}" class="group flex items-center gap-3 bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-2xl font-bold transition-all shadow-lg shadow-indigo-200">
            Lanjut ke Konsep Struktur Data
            <i data-lucide="arrow-right" class="group-hover:translate-x-1 transition-transform"></i>
        </a>
    </div>
@endsection