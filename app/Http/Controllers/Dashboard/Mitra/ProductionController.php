<?php

namespace App\Http\Controllers\Dashboard\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Production;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $start = Carbon::now()->toDateTimeString();
        // $end = Carbon::now()->addDays(7)->addSeconds(30)->addMinutes(23)->toDateTimeString();
        $kumbungs = \App\Kumbung::all();
        $productionTypes = \App\ProductionType::all();
        $kebutuhanTypes = \App\KebutuhanType::all();
        return view('dashboard.modules.mitra.productions.index')
            ->withKumbungs($kumbungs)
            ->withProductionTypes($productionTypes)
            ->withKebutuhanTypes($kebutuhanTypes);
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
        $production = new Production;
        $production->name = $request->name;
        $production->description = $request->description;
        $production->created_at = Carbon::parse($request->created_at);
        $production->done_at = Carbon::parse($request->done_at);
        $production->status = '1';
        $production->production_type_id = $request->production_type_id;
        $production->updated_by_uid = $request->updated_by_uid;
        $production->kumbung_id = $request->kumbung_id;
        $production->save();

        $keuangan = new \App\Keuangan;
        $keuangan->name = "Data Keuangan Produksi $production->id";
        $keuangan->description = "Deskripsi Keuangan Produksi $production->id";
        $keuangan->created_at = now();
        $keuangan->production_id = $production->id;
        $keuangan->save();

        $pengeluarans = [];
        $kebutuhans = [];
        foreach ($request->pengeluaran_nominal as $i => $value) {
            $pengeluarans[] = [
                'nominal' => $request->pengeluaran_nominal[$i],
                'description' => $request->pengeluaran_description[$i],
                'created_at' => now(),
                'keuangan_id' => $keuangan->id
            ];
            DB::table('pengeluarans')->insert($pengeluarans[$i]);
            $kebutuhans[] = [
                'nominal' => $request->kebutuhanType_nominal[$i],
                'kebutuhan_type_id' => $request->kebutuhanType_id[$i],
                'pengeluaran_id' => \App\Pengeluaran::orderBy('id', 'desc')->first()->id
            ]; 
        }
        DB::table('kebutuhans')->insert($kebutuhans);
        
        // $this->command->info("Data Dummy Pengeluaran berhasil diinsert");
        \Session::flash('alert-type', 'success'); 
        \Session::flash('alert-message', 'Data Produksi Berhasil Ditambahkan!'); 
        return redirect()->route('dashboard.mitra.productions.index');
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

    /**
     * Only for Production features
     *
     */
    
}
