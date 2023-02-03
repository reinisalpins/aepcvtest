<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Blocked;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($postId)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
                
        $this->validate($request, [
            'email' => 'required|email',
            'comment' => 'required',
        ]);
        
    if (Blocked::where('email', $request->email)->exists()) {
        return redirect()->back()->with('error', 'Sis lietotajs ir blokets no komentesanas');
    }
        $comment = new Comment;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $post->comments()->save($comment);

        return redirect()->action('PostController@show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function destroy($postId, $email)
{
    Comment::where('email', $email)->delete();
        $blockedEmail = new Blocked;
        $blockedEmail->email = $email;
        $blockedEmail->save();
    return back();
}

public function unblock($email)
{
    Blocked::where('email', $email)->delete();
    return back();
}

}
