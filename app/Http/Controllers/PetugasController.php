<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\rute_user;

class PetugasController extends Controller
{
    public function isisaldo()
    {
        return view('petugas.saldo');
    }
    public function findUser(Request $request)
    {
        $user=User::find($request->kode);
        return $user;
    }
    public function TopUp(Request $request,$id)
    {
        $user=User::findOrFail($id);
        $user->saldo=$user->saldo+$request->nilai;
        $user->save();
        return redirect()->back();
    }
    // ---------
    public function checkin(Request $request)
    {
        if (isset($request->kode)) {
            $tiket=rute_user::where('kode','=',$request->kode)->first();
            if ($tiket) {
                return view('petugas.checkin',['tiket'=>$tiket]);
            }else{
                return redirect()->back()->with('gagal','Data Tidak di Temukan');
            }
        }
        return view('petugas.index');
    }
    public function used(Request $request)
    {
        // dd($request->all());
        $tiket=rute_user::where('kode','=',$request->kode)->first();
        $tiket->delete();
        return redirect('checkin');
    }


// CRUD Petugas

    private function getUser($id)
    {
        $petugas=User::where([
            ['id','=',$id],
            ['role','=','user']
        ])->first();
        return $petugas;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas=User::where('role','=','petugas')->get();
        return view('backend.petugas.index',['petugas'=>$petugas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $petugas= $this->getUser($request->id);
        return $petugas;
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
        $petugas= $this->getUser($request->id);
        if ($petugas == '') {
            abort(404);
        }
        $petugas->role='petugas';
        $petugas->save();
        return redirect('/data_petugas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas= User::findOrFail($id);
        $petugas->role='user';
        $petugas->save();
        return redirect('/data_petugas');
    }
}
