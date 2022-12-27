<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SharePosts;


class SharePost extends Controller
{

    public function viewPage()
    {
        $getPosts = SharePosts::get();
        return view('backend/add-blog', ['data' => $getPosts]);
    }
    public function sharePost(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        $imgName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('img'), $imgName);

        $addPost = SharePosts::create([
            'title' => $request->title,
            'image' => $imgName,
            'details' => $request->details
        ]);

        if ($addPost) {
            return redirect('admin/blog')->with('status', 'success');
        } else {
            return redirect('admin/blog')->with('status', 'error');
        }
    }
    public function deletePost(Request $request)
    {
        $deletePost = SharePosts::where('id', $request->id)->delete();
        if ($deletePost) {
            return redirect('admin/blog')->with('delete', 'success');
        } else {
            return redirect('admin/blog')->with('delete', 'error');
        }
    }
}
