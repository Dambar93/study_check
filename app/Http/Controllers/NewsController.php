<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Events\NewsViewed;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Mail\NewsCreated;
use Illuminate\Support\Facades\Mail;

class NewsController extends Controller
{
    //

    public function index()
    {
        return view('index');
    }

    public function list()
    {
        $news=News::all();
        return view('news.list', compact('news'));
    }

    public function show(News $news)
    {   
        NewsViewed::dispatch($news, new \DateTime());

        return view('news.show', compact('news'));
    }

    public function create(Request $request)
    {
        
        if ($request->isMethod('POST')) {
            
            
            $news = News::create($request->all());

            $category = Category::find($request->post('category_id'));
            $news->category()->associate($category);

            $imagePath = $request->file('news_image')->store('public/news');
            $news->image = trim($imagePath,"public/");

            $news->save();

            Mail::later(now()->addSeconds(30), new NewsCreated($news));

            return redirect('news')
                ->with('success', 'News created successfully!');
        }
        $categories=Category::all();

        return view('news.create', compact('categories'));
    }

    public function destroy(News $news)
    {

        $news->delete();

        return redirect('news')
        ->with('success', 'News deleted successfully!');
    }

    public function edit(News $news, Request $request )
    {
        if ($request->isMethod('POST')) {
            
            
            $news -> update($request->all());
            $news-> save();
            $category = Category::find($request->post('category_id'));
            $news->category()->associate($category);
            $news->save();

            return redirect('news')
                ->with('success', 'News updated successfully!');
        }

        $categories=Category::all();
        
        return view('news.edit', compact('news','categories'));
    }

}
