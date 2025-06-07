<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;

class MateriController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            $materi = Materi::all();
            return view('admin.materi.index', compact('materi'));
        }

        if ($user->hasRole('ustadz')) {
            $materi = Materi::where('user_id', $user->id)->get();
            return view('ustadz.materi.index', compact('materi'));
        }

        if ($user->hasRole('user')) {
            $materi = Materi::where('status', 'approved')->get();
            return view('user.materi.index', compact('materi'));
        }

        abort(403); // akses ditolak jika role tidak dikenal
    }

    public function store(Request $request)
    {
        // Validasi semua field input
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date|after_or_equal:today',
            'waktu' => 'required',
            'isi' => 'required|string',
            'kategori' => 'required|in:A,B',
            'file' => 'required|mimes:pdf,mp4|max:10240',
        ]);

        // Simpan file ke storage 'public/materi'
        $path = $request->file('file')->store('materi', 'public');

        // Simpan data ke database dengan mass assignment (pastikan $fillable di model sudah ada)
        Materi::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'isi' => $request->isi,
            'kategori' => $request->kategori,
            'file' => basename($path), // simpan hanya nama file, supaya path di blade benar
            'tipe' => $request->file('file')->getClientOriginalExtension() === 'mp4' ? 'video' : 'pdf',
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Materi berhasil diupload.');
    }

    public function verifikasi($id)
    {
        $materi = Materi::findOrFail($id);

        // Update status materi jadi 'approved'
        $materi->status = 'approved';
        $materi->save();

        return redirect()->back()->with('success', 'Materi berhasil diverifikasi.');
    }

    public function create()
    {
        return view('ustadz.materi.create');
    }

}
