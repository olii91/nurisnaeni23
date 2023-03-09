<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
    public function store(Request $request)
    {
        $request->validate([
            'nik' => ['required', 'unique:masyarakat', 'numeric'],
            'name' => ['required'],
            'username' => ['required', 'unique:masyarakat'],
            'password' => ['required'],
            'telp' => ['required', 'numeric'],
        ]);
        //
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
        $request->validate([
            'nik' => ['required', 'numeric'],
            'name' => ['required'],
            'username' => ['required'],
            'password' => ['nullable'],
            'telp' => ['required', 'numeric'],
        ]);
        try{
            $masyarakat = masyarakat::find($id);
            $masyarakat->username = $request->username;
            $masyarakat->name= $request->name;
            // $user->email = $request->email;
            $masyarakat->password = Hash::make($request->password);
            $masyarakat->telp= $request->telp;
            $masyarakat->level= $request->level;
            $masyarakat->save();

        //
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
