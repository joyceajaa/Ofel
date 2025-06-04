<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::latest()->paginate(10); // Or however you want to fetch your feedbacks
        return view('admin.feedback.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024000', // Validate image
            'video' => 'nullable|file|mimes:mp4,mov,avi|max:1024000', // Validate video
        ]);

        $imagePath = null;
        $videoPath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('feedback_images', 'public');
        }

        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('feedback_videos', 'public');
        }

        $validatedData['image'] = $imagePath;
        $validatedData['video'] = $videoPath;

        Feedback::create($validatedData);

        return redirect()->route('admin.feedback.index')->with('success', 'Feedback created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        // You might not need a show method in the admin panel
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        return view('admin.feedback.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|file|mimes:mp4,mov,avi|max:10240', // 10MB limit
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasFile('image')) {
            // Delete the old image
            if ($feedback->image) {
                Storage::delete('public/' . $feedback->image);
            }

            $imagePath = $request->file('image')->store('public/feedback_images');
            $validatedData['image'] = Str::replace('public/', '', $imagePath); // Store without 'public/'
        }

        if ($request->hasFile('video')) {
            // Delete the old video
            if ($feedback->video) {
                Storage::delete('public/' . $feedback->video);
            }
            $videoPath = $request->file('video')->store('public/feedback_videos');
            $validatedData['video'] = Str::replace('public/', '', $videoPath); // Store without 'public/'
        }

        $feedback->update($validatedData);

        return redirect()->route('admin.feedback.index')->with('success', 'Feedback updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        // Delete image/video files
        if ($feedback->image) {
            Storage::delete('public/' . $feedback->image);
        }

        if ($feedback->video) {
            Storage::delete('public/' . $feedback->video);
        }

        $feedback->delete();

        return redirect()->route('admin.feedback.index')->with('success', 'Feedback deleted successfully!');
    }
}