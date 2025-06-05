<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Import Log facade

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024', // Changed to KB
            'video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg|max:2000',  // Changed to KB
        ]);

        $data = $request->only('name', 'email', 'message'); // Exclude image and video initially

        // Simpan file image jika ada
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('feedback_images', 'public');
        }

        // Simpan file video jika ada
        if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('feedback_videos', 'public');
        }

        // Tambahkan user_id ke data
        $data['user_id'] = auth()->user()->id_users; // Dapatkan ID user yang sedang login, asumsikan kolomnya id_users

        try {
            Feedback::create($data);
            return redirect()->route('admin.feedback.index')->with('success', 'Terima kasih atas feedback Anda!');
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan feedback: ' . $e->getMessage());
            return back()->with('error', 'Gagal menyimpan feedback. Silakan coba lagi.'); // Tambahkan pesan error ke view
        }

    }


    /**
     * Hapus feedback yang ditentukan. (Hanya untuk Admin)
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        try {
            $feedback->delete();
            return redirect()->route('admin.feedback.index')->with('success', 'Feedback berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus feedback (admin): ' . $e->getMessage());
            return back()->with('error', 'Gagal menghapus feedback. Silakan coba lagi.'); // Tambahkan pesan error ke view
        }

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
        //if ($feedback->email !== Auth::user()->email) { // Periksa email atau kolom user_id (terbaik)

        if ($feedback->user_id !== Auth::user()->id_users) { // Periksa user_id
            abort(403, 'Unauthorized action.'); // Atau redirect
        }

        try {
            // Hapus feedback
            $feedback->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('feedback') // Atau ke halaman feedback pengguna
                             ->with('success', 'Feedback Anda berhasil dihapus.');

        } catch (\Exception $e) {
            Log::error('Gagal menghapus feedback pengguna: ' . $e->getMessage());
            return back()->with('error', 'Gagal menghapus feedback Anda. Silakan coba lagi.');
        }
    }
}