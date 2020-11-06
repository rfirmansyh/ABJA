<?php

namespace App\Http\Controllers\Dashboard\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Budidaya;
use Auth;

class BudidayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $budidayas = Budidaya::paginate(4);
        return view('dashboard.modules.mitra.budidaya.index')->with(['budidayas' => $budidayas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mainteners = \App\User::where('role_id', 3)->get();
        return view('dashboard.modules.mitra.budidaya.create')->with(['mainteners' => $mainteners]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $budidaya = new Budidaya;
        // if ($request->file('photo')) {
        //     $file = $request->file('photo')->store('photo/budidaya', 'public');
        //     $budidaya->photo = $file;
        // }
        $budidaya->name = $request->name;
        $budidaya->large = $request->large;
        $budidaya->status = $request->status;
        $budidaya->provinsi = $request->provinsi;
        $budidaya->kabupaten = $request->kabupaten;
        $budidaya->kecamatan = $request->kecamatan;
        $budidaya->kelurahan = $request->kelurahan;
        $budidaya->detail_address = $request->detail_address;
        $budidaya->owned_by_uid = Auth::user()->id;
        $budidaya->save();
        
        \Session::flash('alert-type', 'success'); 
        \Session::flash('alert-message', 'Data Budidaya Berhasil Ditambahkan!'); 
        return redirect()->route('dashboard.mitra.budidaya.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $budidaya = Budidaya::findOrFail($id);

        return view('dashboard.modules.mitra.budidaya.show')->with(['budidaya' => $budidaya]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $budidaya = Budidaya::findOrFail($id);
        return view('dashboard.modules.mitra.budidaya.edit')->with(['budidaya' => $budidaya]);
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
        $budidaya = Budidaya::findOrFail($id);
        if ($request->file('photo')) {
            if($budidaya->photo && file_exists(storage_path('app/public/' . $budidaya->photo))){
                \Storage::delete('public/'.$budidaya->photo);
            }
            $file = $request->file('photo')->store('photo/budidaya', 'public');
            $budidaya->photo = $file;
        }
        $budidaya->name = $request->name;
        $budidaya->large = $request->large;
        $budidaya->status = $request->status;
        if ($request->provinsi && $request->kabupaten && $request->kecamatan && $request->kelurahan) {
            $user->provinsi = $request->provinsi;
            $user->kabupaten = $request->kabupaten;
            $user->kecamatan = $request->kecamatan;
            $user->kelurahan = $request->kelurahan;
        }
        if ($request->detail_address){
            $user->detail_address = $request->detail_address;
        }

        $budidaya->save();
        \Session::flash('alert-type', 'success'); 
        \Session::flash('alert-message', 'Data Budidaya Berhasil Diubah!'); 
        return redirect()->route('dashboard.mitra.budidaya.edit', $id);
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
