<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import Storage facade

class FeedbackController extends Controller
{
    // ... other methods ...

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
            'video' => 'nullable|file|mimes:mp4,mov,avi|max:10240', // Validate video
        ]);

        $imagePath = null;
        $videoPath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('feedback_images', 'public');  // Store in storage/app/public/feedback_images
            $imagePath = Storage::url($imagePath); //Get the URL for the image
        }

        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('feedback_videos', 'public'); // Store in storage/app/public/feedback_videos
            $videoPath = Storage::url($videoPath); //Get the URL for the video
        }

        Feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'image_url' => $imagePath,
            'video_url' => $videoPath,
        ]);

        return redirect()->route('admin.feedback.index')->with('success', 'Feedback created successfully.');
    }

    // ... other methods ...
}
