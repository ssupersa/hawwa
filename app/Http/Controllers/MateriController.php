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
        

        abort(403); // akses ditolak
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,mp4|max:10240',
        ]);

        $path = $request->file('file')->store('materi', 'public');

        Materi::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'file' => $path,
            'tipe' => $request->file('file')->getClientOriginalExtension() === 'mp4' ? 'video' : 'pdf',
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Materi berhasil diupload.');
    }

    public function verifikasi($id)
{
    $materi = Materi::findOrFail($id);

    // Update status materi jadi 'diverifikasi'
    $materi->status = 'approved';
    $materi->save();

    return redirect()->back()->with('success', 'Materi berhasil diverifikasi.');
}

}
