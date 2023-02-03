<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Validator;
use App\Post;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return $posts;
    }
    //
    public function update(Request $request, $id)
    {
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|unique:posts,title,'.$id,
            'text' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->text = $request->text;
        $post->save();
        return response()->json(['message' => 'Ieraksts veiksmigi labots!'], 200);
    }

}
