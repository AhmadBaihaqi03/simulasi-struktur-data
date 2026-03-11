<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\StudentGroup;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman utama dashboard instruktur.
     */
    public function index()
    {
        $user = Auth::user();

        // 1. Ambil data sesi untuk tabel
        // withCount akan otomatis membuat atribut: groups_count & pending_evaluations_count
        $sessions = Session::where('user_id', $user->id)
        ->withCount([
            'groups' => function($query) {
                $query->where('is_submitted', true);
            }, 
            // Menghitung grup yang sudah submit tapi belum ada di tabel evaluations
            'groups as pending_evaluations_count' => function($query) {
                $query->where('is_submitted', true)
                      ->whereDoesntHave('evaluation');
            }
        ])
        ->latest()
        ->paginate(10);

        // 2. Hitung statistik untuk 6 Card Utama
        $stats = [
        // Statistik Sesi
        'total'        => Session::where('user_id', $user->id)->count(),
        'active'       => Session::where('user_id', $user->id)->where('is_active', true)->count(),
        
        // Statistik Grup (Global) - Update: Hanya menghitung yang sudah submit
        'total_groups' => StudentGroup::whereHas('session', function($q) use ($user) {
                            $q->where('user_id', $user->id);
                         })
                         ->where('is_submitted', true) // Tambahan filter
                         ->count(),

        // Total grup yang butuh dinilai (Global)
        'pending'      => StudentGroup::whereHas('session', function($q) use ($user) {
                            $q->where('user_id', $user->id);
                         })
                         ->where('is_submitted', true)
                         ->whereDoesntHave('evaluation')
                         ->count(),

        // Total grup yang sudah selesai dinilai (Global)
        'graded'       => StudentGroup::whereHas('session', function($q) use ($user) {
                            $q->where('user_id', $user->id);
                         })
                         ->whereHas('evaluation')
                         ->count(),
        ];

        return view('dashboard', compact('sessions', 'stats'));
    }

    /**
     * Toggle status aktif/nonaktif sesi (untuk tombol saklar di tabel)
     */
    public function toggle(Session $session)
    {
        // Pastikan hanya pemilik sesi yang bisa mengubah status
        if ($session->user_id !== Auth::id()) {
            abort(403);
        }

        $session->update([
            'is_active' => !$session->is_active
        ]);

        $status = $session->is_active ? 'diaktifkan' : 'dinonaktifkan';
        
        return back()->with('success', "Sesi '{$session->title}' berhasil {$status}.");
    }

    /**
     * Menghapus sesi beserta data terkait
     */
    public function destroy(Session $session)
    {
        if ($session->user_id !== Auth::id()) {
            abort(403);
        }

        $session->delete();

        return back()->with('success', 'Sesi berhasil dihapus secara permanen.');
    }
}