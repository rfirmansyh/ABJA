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
        $production->maked_by_uid = $request->maked_by_uid;
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
                'nominal' => $request->kebutuhan_nominal[$i],
                'kebutuhan_type_id' => $request->kebutuhan_type_id[$i],
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inputdata(Request $request, $id)
    {   
        // check all
        if(
            in_array(!null, $request->panen_nominal) ||
            in_array(!null, $request->kebutuhan_nominal) ||
            in_array(!null, $request->pemasukan_other_nominal) ||
            in_array(!null, $request->pengeluaran_other_nominal)
        ) {

            $production = Production::findOrFail($id);
            $production->updated_by_uid = $request->updated_by_uid;
            $production->save();

            $keuangan_num_next = \App\Keuangan::where('production_id', '=', $id)->count() + 1;
            $keuangan = new \App\Keuangan;
            $keuangan->name = "Data Keuangan Produksi ID: $production->id ke $keuangan_num_next";
            $keuangan->description = "Deskripsi Keuangan Produksi ID: $production->id ke $keuangan_num_next";
            $keuangan->created_at = now();
            $keuangan->production_id = $production->id;
            $keuangan->save();

            $panens = [];
            // if panen nominal not contain null
            if (in_array(!null, $request->panen_nominal)) {
                $pemasukans = [];
                foreach ($request->panen_nominal as $i => $value) {
                    $pemasukans[] = [
                        'nominal' => $request->pemasukan_nominal[$i],
                        'description' => $request->pemasukan_description[$i],
                        'created_at' => now(),
                        'keuangan_id' => $keuangan->id
                    ];
                    if ($value !== null) {
                        DB::table('pemasukans')->insert($pemasukans[$i]);
                        $panens[] = [
                            'nominal' => $request->panen_nominal[$i],
                            'description' => $request->panen_description[$i],
                            'panen_at' => $request->panen_at[$i] !== null ? Carbon::parse($request->panen_at[$i]) : Carbon::now(),
                            'pemasukan_id' => \App\Pemasukan::orderBy('id', 'desc')->first()->id
                        ]; 
                    }
                }
                DB::table('panens')->insert($panens);
                
            }

            $kebutuhans = [];
            // if kebutuhan nominal not contain null
            if (in_array(!null, $request->kebutuhan_nominal)) {
                $pengeluarans = [];
                foreach ($request->kebutuhan_nominal as $i => $value) {
                    $pengeluarans[] = [
                        'nominal' => $request->pengeluaran_nominal[$i],
                        'description' => $request->pengeluaran_description[$i],
                        'created_at' => now(),
                        'keuangan_id' => $keuangan->id
                    ];
                    if ($value !== null) {
                        DB::table('pengeluarans')->insert($pengeluarans[$i]);
                        $kebutuhans[] = [
                            'nominal' => $request->kebutuhan_nominal[$i],
                            'kebutuhan_type_id' => $request->kebutuhan_type_id[$i],
                            'pengeluaran_id' => \App\Pengeluaran::orderBy('id', 'desc')->first()->id
                        ]; 
                    }
                }
                DB::table('kebutuhans')->insert($kebutuhans);
            }

            $pemasukan_others = [];
            // if pemasukan other nominal not contain null
            if (in_array(!null, $request->pemasukan_other_nominal)) {
                foreach ($request->pemasukan_other_nominal as $i => $value) {
                    if($value !== null) {
                        $pemasukan_others[] = [
                            'nominal' => $request->pemasukan_other_nominal[$i],
                            'description' => $request->pemasukan_other_description[$i],
                            'created_at' => now(),
                            'keuangan_id' => $keuangan->id
                        ];
                    }
                }
                DB::table('pemasukans')->insert($pemasukan_others);
            }

            $pengeluaran_others = [];
            // if pengeluaran other nominal not contain null
            if (in_array(!null, $request->pengeluaran_other_nominal)) {
                foreach ($request->pengeluaran_other_nominal as $i => $value) {
                    if ($value !== null) {
                        $pengeluaran_others[] = [
                            'nominal' => $request->pengeluaran_other_nominal[$i],
                            'description' => $request->pengeluaran_other_description[$i],
                            'created_at' => now(),
                            'keuangan_id' => $keuangan->id
                        ];
                    }
                }
                DB::table('pengeluarans')->insert($pengeluaran_others);
            }

            $feedback = "Input Data Produksi : ";
            $result_panen = count($panens);
            $result_kebutuhan = count($kebutuhans);
            $result_pemasukan_other = count($pemasukan_others);
            $result_pengeluaran_other = count($pengeluaran_others);
            if ($result_panen != 0) { $feedback .= "$result_panen Data Panen, "; }
            if ($result_kebutuhan != 0) { $feedback .= "$result_kebutuhan Data Kebutuhan, "; }
            if ($result_pemasukan_other != 0) { $feedback .= "$result_pemasukan_other Data Pemasukan, "; }
            if ($result_pengeluaran_other != 0) { $feedback .= "$result_pengeluaran_other Data Pengeluaran, "; }
            $feedback .= "Berhasil !";

            \Session::flash('alert-type', 'success'); 
            \Session::flash('alert-message', $feedback); 
            return redirect()->route('dashboard.mitra.productions.index');
        } else {
            \Session::flash('alert-type', 'warning'); 
            \Session::flash('alert-message', 'Gagal Input Data, semua data kosong !'); 
            return redirect()->back()->withErrors('Input Nominal ini tidak boleh kosong semua', 'nominal');
        }
        
        
    }

    public function updatestatus(Request $request, $id)
    {
        $production = Production::findOrFail($id);
        $production->status = $request->status;
        $production->save();
        \Session::flash('alert-type', 'success'); 
        \Session::flash('alert-message', "Produksi Kumbung ID : $production->kumbung_id : ". $production->kumbung->name ." Berhasil Diselesaikan"); 
        return redirect()->route('dashboard.mitra.productions.index');
    }

}
