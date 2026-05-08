<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the blogs.
     */
    public function index()
    {
        $blogs = Blog::orderBy('date', 'desc')->get();
        $categories = Blog::distinct()->pluck('category');
        
        return view('blogs.index', compact('blogs', 'categories'));
    }

    /**
     * Display the specified blog.
     */
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('blogs.show', compact('blog'));
    }

    /**
     * Filter blogs by category and/or date.
     */
    public function filter(Request $request)
    {
        $query = Blog::query();
        
        if ($request->category) {
            $query->where('category', $request->category);
        }
        
        if ($request->date) {
            $query->whereDate('date', $request->date);
        }
        
        $blogs = $query->orderBy('date', 'desc')->get();
        
        return response()->json([
            'html' => view('blogs.partials.blog-list', compact('blogs'))->render(),
            'count' => $blogs->count()
        ]);
    }

    /**
     * Search blogs by title or content.
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        
        $blogs = Blog::where('title', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%")
                    ->orWhere('short_description', 'like', "%{$query}%")
                    ->orderBy('date', 'desc')
                    ->get();
        
        return response()->json([
            'html' => view('blogs.partials.blog-list', compact('blogs'))->render(),
            'count' => $blogs->count()
        ]);
    }
}
