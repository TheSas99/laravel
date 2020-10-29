<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->get();
        return view('news-items.index', compact('newsItems'));

        $comments = Comment::where('slug', '=', $slug)->first();

        $related = Comment::whereHas('tags', function ($q) use ($comments) {
            return $q->whereIn('name', $comments->tags->pluck('name'));
        })
            ->where('id', '!=', $comments->id) // So you won't fetch same post
            ->get();
    }

    public function create()
    {
        return view('news-items', compact('comments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $comment = new Comment();
        $comment->comment = $request->get('comment');

        $comment->save();
        return redirect('news')->with('succes', 'Comment is opgeslagen');
    }

    public function show($id)
    {
        $comment = Comment::find($id);
        if ($comment === null) {
            abort( 404, "Deze comment is niet gevonden");
        }

        return view('news-items.show', compact('newsItem'));
    }
}
