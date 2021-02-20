<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transportasi;
use App\Rute;

class RuteController extends Controller
{

    public function historyRute($key )
    {
        if ($key == 'pesawat') {
            $rute=Rute::where('tipe','=','pesawat')->onlyTrashed()->get();
            return view('backend.rute.history',['rute'=>$rute,'tipe'=>'Pesawat']);
        }else{
            $rute=Rute::where('tipe','=','kereta')->onlyTrashed()->get();
            return view('backend.rute.history',['rute'=>$rute,'tipe'=>'Kereta']);
        }
    }


    public function ajax(request $request)
    {
        if ($request->keyword) {
            $transportasi=
            Transportasi::where([
                ['id','like',$request->keyword],
                ['tipe','=',$request->tipe],
                ['ready','=',1]
                ])
            ->orWhere([
                ['nama','like','%'.$request->keyword.'%'],
                ['tipe','=',$request->tipe],
                ['ready','=',1]
                ])
            ->paginate(10);
        }else{
            $transportasi=Transportasi::where([
                ['tipe','=',$request->tipe],
                ['ready','=',1]
                ])->paginate(10);
        }
        return view('backend.rute.search-transportasi',['transportasi'=>$transportasi]);
    }


    // public function kereta()
    // {
    //     $rute=Rute::where('tipe','=','kereta')->get();
    //     return view('backend.rute.kereta',['rute'=>$rute]);
    // }

    // public function pesawat()
    // {
    //     $rute=Rute::where('tipe','=','pesawat')->get();
    //     return view('backend.rute.pesawat',['rute'=>$rute]);
    // }

    public function perjalanan($key)
    {
        if ($key == 'pesawat') {
            $rute=Rute::where('tipe','=','pesawat')->get();
            return view('backend.rute.pesawat',['rute'=>$rute]);
        }else{
            $rute=Rute::where('tipe','=','kereta')->get();
            return view('backend.rute.kereta',['rute'=>$rute]);
        }
    }

    public function sync()
    {
        $rute=Rute::where('waktu_tiba','<',date('Y-m-d H:i:s'));
        foreach ($rute->get() as $r) {
            Transportasi::find($r->transportasi_id)->update(['ready'=>1]);
        }
        $rute->delete();
        return redirect()->back();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/perjalanan/kereta');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->tipe == 'pesawat') {
            $tipe="pesawat";
        }else{
            $tipe='kereta';
        }
        $transportasi= transportasi::where('tipe','=',$tipe);
        return view('backend.rute.create',['tipe'=>$tipe,'transportasi'=>$transportasi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rute = Rute::create($request->all());
        $transportasi=transportasi::findOrFail($rute->transportasi_id);
        $transportasi->ready=0;
        $transportasi->save();
        return redirect('perjalanan/'.$rute->tipe);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rute=Rute::withTrashed()->findOrFail($id);
        // dd($rute->transportasi);
        return view('backend.rute.detail',['rute'=>$rute]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rute = Rute::findOrFail($id);
        $rute->waktu_berangkat=str_replace(' ', 'T', $rute->waktu_berangkat);
        $rute->waktu_tiba=str_replace(' ', 'T', $rute->waktu_tiba);
        return view('backend.rute.edit',['rute'=>$rute]);
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
        $rute = Rute::findOrFail($id);
        $rute->update($request->all());
        return redirect('perjalanan/'.$rute->tipe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($transportasi=Rute::find($id)) {

            $transportasi->ready=1;
            $transportasi->save();
            $rute->delete();
            return redirect('perjalanan/'.$rute->tipe);

        }elseif($transportasi=Rute::onlyTrashed()->findOrFail($id)) {
            $transportasi->ready=1;
            $transportasi->save();
            $rute->forceDelete();
            return redirect('perjalanan/'.$rute->tipe.'/riwayat');

        }
    }
}
