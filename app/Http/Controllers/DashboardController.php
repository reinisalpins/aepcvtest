<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Blocked;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $postsCount = Post::count();
        $posts = Post::all();
        $comments = Comment::all();
        $commentsCount = Comment::count();
        $blocked = Blocked::all();
        $blockedCount = Blocked::count();
        $latestPosts = Post::latest()->take(3)->get();
        $latestBlocked = Blocked::latest()->take(3)->get();
        $latestComments = Comment::latest()->take(3)->get();

        return view('dashboard.index', compact('postsCount', 'comments', 'blocked', 'posts', 'commentsCount', 'blockedCount','latestPosts','latestBlocked','latestComments'));
    }

}
