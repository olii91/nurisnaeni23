<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $user = User::all();
        return view('user.index')->with('user',$user);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
public function create()
{
return view('user.create');
}
    /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
{
    $request->validate([
        'username' => ['required', 'string', 'unique:users'],
        'name' => ['required', 'string', 'max:255'],
        'password' => ['required'],
        // 'email' => ['required', 'string', 'email', 'max:255','unique:users'],
        // 'password' => ['required', 'string', 'min:8'],
        'telp' => ['required', 'numeric'],
        'level' => ['required','string'],
    ]);
    try{
        $user = new User;
        $user->username = $request->username;
        $user->name= $request->name;
        // $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->telp= $request->telp;
        $user->level= $request->level;
        $user->save();
    }
    catch(\Exception $e ){
        dd($e->getMessage());
        // return redirect()->back()->withErrors(['User gagal disimpan']);
    }
        return redirect('user')->with('status','User Berhasil ditambahkan');
    }
    /**
    * Display the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
    //
    }
    /**
    * Show the form for editing the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    //
    }
    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => ['required'],
            'name' => ['required'],
            'password' => ['nullable'],
            'telp' => ['required', 'numeric'],
            'level' => ['required'],
        ]);

        try {
            // dd($request=>all());
            $user = User::find($id);
            $user->username = $request->username;
            $user->name = $request->name;
            if($request->password !=""){
                $user->password = Hash::make($request->password);
            }
            $user->telp = $request->telp;
            $user->level = $request->level;
            $user->save();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return redirect('user')->with('success', 'Data Petugas berhasil di ubah.');
    //
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success','User berhasil dihapus');
        
    }
}