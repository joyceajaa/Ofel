<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function indexPublic()
    {
        $feedbacks = Feedback::latest()->paginate(10); // Ambil feedback terbaru dengan paginasi
        return view('feedback.index', compact('feedbacks'));
    }

    public function index()
    {
        $feedbacks = Feedback::latest()->paginate(10); // Ambil feedback terbaru dengan paginasi
        return view('admin.feedback.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('admin.feedback.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Feedback::create($request->all());

        return redirect()->route('feedback')
                         ->with('success', 'Terima kasih atas feedback Anda!');
    }

    /**
     * Hapus feedback yang ditentukan. (Hanya untuk Admin)
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
            $feedback->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.feedback') // Atau ke route yang sesuai
                ->with('success', 'Feedback berhasil dihapus.');
    }

    /**
     * Hapus feedback yang dibuat oleh pengguna saat ini. (Hanya untuk pengguna terautentikasi)
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
     // **CATATAN PENTING: FUNGSI INI HARUS DILINDUNGI DENGAN BAIK**
    public function destroyUserFeedback(Feedback $feedback)
    {
        // 1. Otorisasi: Pastikan pengguna yang login *adalah* pemilik feedback ini
        if ($feedback->email !== Auth::user()->email) { // Periksa email atau kolom user_id (terbaik)
            abort(403, 'Unauthorized action.'); // Atau redirect
        }

        try {
            // Hapus feedback
            $feedback->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('feedback') // Atau ke halaman feedback pengguna
                             ->with('success', 'Feedback Anda berhasil dihapus.');

        } catch (\Exception $e) {
            // Tangani error
            \Log::error('Gagal menghapus feedback pengguna: ' . $e->getMessage());
            return back()->with('error', 'Gagal menghapus feedback Anda. Silakan coba lagi.');
        }
    }
}
