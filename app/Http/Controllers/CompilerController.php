<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Process; // Ini library Laravel untuk jalankan command
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompilerController extends Controller
{
    public function index(){
        return view('compiler'); // Pastikan nama file blade kamu adalah compiler.blade.php
    }

    public function run(Request $request)
    {
        $code = $request->input('code');

        if (empty($code)) {
            return response()->json(['error' => 'Peringatan: Tidak ada kode yang dikirim.']);
        }

        // Buat file unik
        $fileName = 'temp_' . time() . '.py';
        $filePath = storage_path('app/' . $fileName);
        
        // Simpan kode
        file_put_contents($filePath, $code);

        // Perintah sakti: tambahkan '2>&1' agar pesan error Python juga tertangkap
        // Kita panggil python secara langsung melalui shell
        $output = shell_exec("python \"$filePath\" 2>&1");

        // Hapus file setelah selesai
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        return response()->json([
            'output' => $output ?? 'Program selesai tanpa output.',
            'error'  => null
        ]);
    }
}