<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transportasi;
use App\Rute;

class TransportasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transportasi=Transportasi::all();
        return view('backend.transportasi.index',['transportasi'=>$transportasi]);
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
        $transportasi = new Transportasi;
        $transportasi->nama = $request->nama;
        $transportasi->kelas = $request->kelas;
        $transportasi->kursi = $request->kursi;
        $transportasi->tipe = $request->tipe;
        $transportasi->save();
        return redirect('/transportasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transportasi=Transportasi::findOrFail($id);
        $rute=Rute::onlyTrashed()->where('transportasi_id','=',$id)->get();
        // dd($rute);
        return view('backend.transportasi.detail',['transportasi'=>$transportasi,'rute'=>$rute]);
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
        $transportasi=Transportasi::find($id);
        $transportasi->nama = $request->nama;
        $transportasi->kelas = $request->kelas;
        $transportasi->kursi = $request->kursi;
        $transportasi->tipe = $request->tipe;
        $transportasi->save();
        return redirect('/transportasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transportasi=Transportasi::find($id);
        $transportasi->delete();
        return redirect()->back();
    }
}
