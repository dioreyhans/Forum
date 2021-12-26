<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id =Auth::user()->id;

       $list = Post::where('user_id', $id)->get();

        return view('dashboard/index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard/create');
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
        $dashboard = new post;

        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'categories_id' => 'required',
        ]);
        $dashboard = post::create([
            "judul" => $request['judul'],
            "isi" => $request['isi'],
            "categories_id" => $request['categories_id'],
            "user_id" => Auth::user()->id
        ]);

        return redirect('dashboard')->with('success', 'Data Berhasil Ditambahkan!');
    
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
        $post = post::find($id);
        return view('dashboard/show',compact('post'));
    
    
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
        $post = post::find($id);
        return view('dashboard/edit',compact('post'));
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
            'judul' => 'required',
            'isi' => 'required',
            'categories_id' => 'required',
        ]);
        $dashboard = post::where("id",$id)
        ->update([
            "judul" => $request['judul'],
            "isi" => $request['isi'],
            "categories_id" => $request['categories_id'],
            "user_id" => Auth::user()->id
        ]);
        return redirect('dashboard')->with('success', 'Data Berhasil Diubah!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete=post::destroy($id);
        return redirect('dashboard')->with('success', 'Data Berhasil Dihapus!');
    
    }
}
