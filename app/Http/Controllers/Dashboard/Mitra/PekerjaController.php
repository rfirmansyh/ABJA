<?php

namespace App\Http\Controllers\Dashboard\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class PekerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($pekerjas = \App\User::where('manager_id', \Auth::user()->id)->get());
        // dd(\App\User::find(5)->maintance_on->name);
        return view('dashboard.modules.mitra.pekerjas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $password = getRandomPassword();
        return view('dashboard.modules.mitra.pekerjas.create')->withPassword($password);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        if ($request->file('photo')) {
            $file = $request->file('photo')->store('photo/profile', 'public');
            $user->photo = $file;
        }
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->bio = $request->bio;
        $user->provinsi = $request->provinsi;
        $user->kabupaten = $request->kabupaten;
        $user->kecamatan = $request->kecamatan;
        $user->kelurahan = $request->kelurahan;
        $user->detail_address = $request->detail_address;
        $user->status = $request->status;
        $user->created_at = now();
        $user->manager_id = \Auth::user()->id;
        $user->role_id = '3';

        $user->save();

        \Session::flash('alert-type', 'success'); 
        \Session::flash('alert-message', 'Data Pekerja Berhasil Ditambahkan!'); 

        $password = getRandomPassword();
        return redirect()->route('dashboard.mitra.pekerjas.create')->withPassword($password);
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
        $pekerja = User::findOrFail($id);
        return view('dashboard.modules.mitra.pekerjas.edit')
                ->withPekerja($pekerja);
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
        $user = User::findOrFail($id);
        $user->name = $request->name;
        if ($request->file('photo')) {
            if($user->photo && file_exists(storage_path('app/public/' . $user->photo))){
                \Storage::delete('public/'.$user->photo);
            }
            $file = $request->file('photo')->store('photo/profile', 'public');
            $user->photo = $file;
        }
        $user->phone = $request->phone;
        $user->bio = $request->bio;
        if ($request->provinsi && $request->kabupaten && $request->kecamatan && $request->kelurahan) {
            $user->provinsi = $request->provinsi;
            $user->kabupaten = $request->kabupaten;
            $user->kecamatan = $request->kecamatan;
            $user->kelurahan = $request->kelurahan;
        }
        if ($request->detail_address){
            $user->detail_address = $request->detail_address;
        }
        $user->status = $request->status;

        $user->save();

        \Session::flash('alert-type', 'success'); 
        \Session::flash('alert-message', 'Data Pekerja Berhasil Diubah!'); 

        return redirect()->route('dashboard.mitra.pekerjas.edit', $id);
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
