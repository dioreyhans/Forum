<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profile;
use App\Models\user;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id =Auth::user()->id;
        $profile = Profile::where('user_id', $id)->first(); 
        return view('profile/index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id =Auth::user()->id;
        $profile = Profile::where('user_id', $id)->first(); 
        return view('profile/create', compact('profile'));
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
        $profile = new profile;

        $request->validate([
            'fullname' => 'required',

            'image' => 'image|file|max:1024',
            'alamat' => 'required'
        ]);
            $profile = profile::create([
                "fullname" => $request['fullname'],
                "alamat" => $request['alamat'],
                "user_id" => Auth::user()->id
            ]);
        
        

        return redirect('profile')->with('toast_success', 'Data Berhasil Diubah!');
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
        $profile = profile::find($id);
        return view('profile/show',compact('profile'));
    
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
        $profile = profile::find($id);
        return view('profile/edit',compact('profile'));
    
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
            'fullname' => 'required',
            'email' => 'required',
            'alamat' => 'required'
        ]);
            $profile = profile::where("id",$id)
            ->update([
                "fullname" => $request['fullname'],
                "alamat" => $request['alamat'],
                "user_id" => Auth::user()->id
            ]);
        
        

        $profile = user::where("id",Auth::user()->id)
        ->update([
            "email" => $request['email']
        ]);
       

        return redirect('profile')->with('toast_success', 'Data Berhasil Diubah!');
    
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
    }
}
