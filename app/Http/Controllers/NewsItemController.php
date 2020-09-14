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
        ]);

        $newsItem = new NewsItem();
        $newsItem->title = $request->get('title');
        $newsItem->description = $request->get('description');
        $newsItem->image = $request->get('image');

        $newsItem->save();
        return redirect('news')->with('succes', 'Review is opgeslagen');
    }

    public function show($id)
    {
        try {
            $newsItem = NewsItem::find($id);
            $error = null;
        } catch (\Exception $e) {
            $newsItem = null;
            $error = $e->getMessage();
        }

        return view('news-items/show', [
            'newsItem' => $newsItem,
            'error' => $error
    ]);
    }
}
