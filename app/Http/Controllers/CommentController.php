<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;
use App\Models\post;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('post/show');
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
    public function store(Request $request)
    {
        //
        $comment = new comment;

        $request->validate([
            'isi' => 'required',
        ]);
        $comment = comment::create([
            "isi" => $request['isi'],
            "posts_id" => $request['post_id'],
            "user_id" => Auth::user()->id
        ]);
        $post = post::find($request['post_id']);
        $comments = comment::where('posts_id', $request['post_id'])->get();
        return view('post/show',compact('post'),compact('comments'));
    
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
        $request->validate([
            'isi' => 'required',
        ]);
        $comment = comment::where("id",$id)
        ->update([
            "isi" => $request['isi'],
            "posts_id" => $request['post_id'],
            "user_id" => Auth::user()->id
        ]);
        $post = post::find($request['post_id']);
        $comments = comment::where('posts_id', $request['post_id'])->get();
        return view('post/show',compact('post'),compact('comments'));
    
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $delete=comment::destroy($id);
        $post = post::find($request['post_id']);
        $comments = comment::where('posts_id', $request['post_id'])->get();
        return view('post/show',compact('post'),compact('comments'));
    }
}
