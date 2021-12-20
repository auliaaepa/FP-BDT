<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class UserController extends Controller
{
    public function index () {
        set_time_limit(360);
        $posts = Post::orderBy('date', 'desc')->paginate(15);
        return view('user/index', compact('posts'));
    }

    public function post ($id) {
        $post = Post::where('_id', $id)->first();
        return view('user/post', compact('post'));
    }

    public function comment ($id) {
        $post = Post::where('_id', $id)->first();
        return view('user/comment', compact('post'));
    }

    public function store (Request $request, $id) {
        $this->validate($request, [
            'comment' => ['required', 'string'],
        ]);

        $post = Post::firstWhere('_id', $id)->push('comments', [
            'body' => $request->comment,
            'email' => Auth::user()->email,
            'author' => Auth::user()->name,
        ]);

        if ($post) {
            return redirect()->route('user.comment', ['id' => $id])->with('success_message', 'Comment sent successfully.');
        } else {
            return redirect()->route('user.comment', ['id' => $id])->with('failed_message', 'Comment failed to send.');
        }
    }
}
