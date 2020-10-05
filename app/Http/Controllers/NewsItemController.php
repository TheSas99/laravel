<?php

namespace App\Http\Controllers;
use App\NewsItem;
use Illuminate\Http\Request;

class NewsItemController extends Controller
{
    public function index()
    {
        $newsItems = NewsItem::all();
        $title = "Alle Reviews";

        return view('news-items.index',
            compact('newsItems', 'title'));

        /*return view('news-items.index', [
            'newsItems' => $newsItems
        ]);*/
    }

    public function create()
    {
        return view('news-items.create');
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
            abort( 404, compact('newsItems'));
        }

        return view('news-items/show', [
            'newsItem' => $newsItem,
            'error' => $error
    ]);
    }
}
