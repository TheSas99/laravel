<?php

namespace App\Http\Controllers;
use App\Category;
use App\NewsItem;
use Illuminate\Http\Request;

class NewsItemController extends Controller
{

    public function index()
    {
        $newsItems = NewsItem::orderBy('created_at', 'desc')->get();
        return view('news-items.index', compact('newsItems'));

        $newsItems = NewsItem::where('slug', '=', $slug)->first();

        $related = NewsItem::whereHas('tags', function ($q) use ($newsItems) {
            return $q->whereIn('name', $newsItems->tags->pluck('name'));
        })
            ->where('id', '!=', $newsItems->id) // So you won't fetch same post
            ->get();
    }

    public function create()
    {
        $categories = Category::all();
        return view('news-items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category' => ['exists:categories,id'],
        ]);

        $newsItem = new NewsItem();
        $newsItem->title = $request->get('title');
        $newsItem->description = $request->get('description');
        $newsItem->category_id = $request->get('category');
        $newsItem->image = $request->get('image');

        $newsItem->save();
        return redirect('news')->with('succes', 'Review is opgeslagen');
    }

    public function show($id)
    {
        $newsItem = NewsItem::find($id);
        if ($newsItem === null) {
            abort( 404, "Deze Review is niet gevonden");
        }

        return view('news-items.show', compact('newsItem'));
    }
}
