<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DateTime;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index () {
        set_time_limit(360);
        $posts = Post::orderBy('date', 'desc')->paginate(15);
        return view('admin/index', compact('posts'));
    }

    public function add () {
        return view('admin/add');
    }

    public function store (Request $request) {
        $this->validate($request, [
            'author' => ['required', 'string'],
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
        ]);
        
        $post = new Post();
        $post->author = $request->author;
        $post->title = $request->title;
        $post->body = $request->body;
        if ($request->tag) {
            $post->tags = [$request->tag, ];
        } else {
            $post->tags = [];
        }
        $post->comments = [];
        $post->date = Carbon::now();
        $post->save();
        
        if ($post) {
            return redirect()->route('admin.home')->with('success_message', 'Post added successfully.');
        } else {
            return redirect()->route('admin.home')->with('failed_message', 'Post failed to add.');
        }            
    }

    public function post ($id) {
        $post = Post::where('_id', $id)->first();
        return view('admin/post', compact('post'));
    }

    public function edit ($id) {
        $post = Post::where('_id', $id)->first();
        return view('admin/edit', compact('post'));
    }

    public function update (Request $request, $id) {
        $this->validate($request, [
            'author' => ['required', 'string'],
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
        ]);

        $post = Post::firstWhere('_id', $id)->update([
            'author' => $request->author, 
            'title' => $request->title,
            'body' => $request->body,
            'date' => Carbon::now(),
        ]);

        if ($post) {
            return redirect()->route('admin.post', ['id' => $id])->with('success_message', 'Post updated successfully.');
        } else {
            return redirect()->route('admin.post', ['id' => $id])->with('failed_message', 'Post failed to update.');
        }
    }

    public function tag ($id) {
        $post = Post::where('_id', $id)->first();
        return view('admin/tag', compact('post'));
    }

    public function save (Request $request, $id) {
        $this->validate($request, [
            'tag' => ['required', 'string'],
        ]);

        $post = Post::firstWhere('_id', $request->id)
            ->where('tags', $request->old_tag)
            ->update(array('tags.$' => $request->tag));    

        if ($post) {
            return redirect()->route('admin.tag', ['id' => $id])->with('success_message', 'Tag updated successfully.');
        } else {
            return redirect()->route('admin.tag', ['id' => $id])->with('failed_message', 'Tag failed to update.');
        }
    }

    public function remove (Request $request, $id) {
        $post = Post::firstWhere('_id', $id)
                ->pull('tags', $request->tag);

        if ($post) {
            return redirect()->route('admin.tag', ['id' => $id])->with('success_message', 'Tag removed successfully.');
        } else {
            return redirect()->route('admin.tag', ['id' => $id])->with('failed_message', 'Tag failed to remove.');
        }
    }

    public function new (Request $request, $id) {
        $post = Post::firstWhere('_id', $id)
                ->push('tags', $request->new_tag, true);

        if ($post) {
            return redirect()->route('admin.tag', ['id' => $id])->with('success_message', 'Tag added successfully.');
        } else {
            return redirect()->route('admin.tag', ['id' => $id])->with('failed_message', 'duplicate tag detected. Tag failed to add.');
        }
    }

    public function comment ($id) {
        $post = Post::where('_id', $id)->first();
        return view('admin/comment', compact('post'));
    }

    public function delete (Request $request, $id) {
        $post = Post::firstWhere('_id', $id)
                ->delete();

        if ($post) {
            return redirect()->route('admin.home')->with('success_message', 'Post deleted successfully.');
        } else {
            return redirect()->route('admin.home')->with('failed_message', 'Post failed to delete.');
        }
    }



}
