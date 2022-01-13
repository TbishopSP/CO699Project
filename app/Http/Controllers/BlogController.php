<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(5);

        return view('blog.index', [
            'blogs' => $blogs,
        ]);
    }

    public function show($id) {

        $blog = Blog::findOrFail($id);

        return view('blog.show', ['blog' => $blog]);
    }
}
