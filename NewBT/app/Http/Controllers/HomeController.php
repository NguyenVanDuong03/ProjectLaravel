<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $postscount = Post::count();
        return view('index', compact('postscount', 'postscount'));
    }
}
