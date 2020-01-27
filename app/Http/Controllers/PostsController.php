<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function show(Request $request)
    {
        return $request;
    }

    public function store(Request $request)
    {
        $fileNameToStore='';
       if ($request->file('image')) {
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('image')->storeAs('public/post_images', $fileNameToStore);

                 $posts= new Post([
                    'image' => $fileNameToStore,
                    'title' => $request['title'],
                    'body' => $request["body"],
                ]);
                $posts->save();
         }
        $updatedpost=Post::all();
        return response()->json($updatedpost, 201);
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());


        return response()->json($post, 200);
    }

    public function delete(Post $post)
    {
        $post->delete();

        return response()->json(null, 204);
    }
}
