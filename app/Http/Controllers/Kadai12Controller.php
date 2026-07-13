<?php

namespace App\Http\Controllers;

use App\Models\SnspostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Kadai12Controller extends Controller
{
    public function index()
    {
        $posts = SnspostModel::with('user')
            ->orderBy('id', 'desc')
            ->get();

        return view('kadai12_1', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->session()->regenerateToken();

        $validated = $request->validate(SnspostModel::$rules, SnspostModel::$messages);

        $post = new SnspostModel();
        $post->user_id = Auth::id();
        $post->comment = $validated['comment'];

        if ($request->hasFile('image')) {
            $image = Storage::disk('public')->put('snspost_images', $request->file('image'));
            $post->img_path = basename($image);
        }

        DB::transaction(function () use ($post) {
            $post->save();
        });

        return redirect()->route('kadai12_1.index');
    }
}
