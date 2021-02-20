<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rute;
use App\rute_user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;


class FrontendController extends Controller
{
    public function index()
    {
    	return view('frontend.index');
    }
    public function tiket($tipe)
    {
    	switch ($tipe) {
    		case 'kereta':
    			$rute=Rute::where('tipe','=','kereta')->get();
    			return view('frontend.tiket.kereta',['rute'=>$rute]);
    			break;
    		case 'pesawat':
    			$rute=Rute::where('tipe','=','pesawat')->get();
    			return view('frontend.tiket.pesawat',['rute'=>$rute]);
    			break;
    		default:
    			abort(404);
    			break;
    	}
    }

    public function dibeli()
    {
        $user=Auth::user();
    	return view('frontend.dibeli',['users'=>$user]);
    }

    public function preview($id)
    {
        $rute=Rute::findOrFail($id);
    	return view('frontend.preview',['rute'=>$rute,'tipe'=>'pesawat']);
    }

    public function order(Request $request)
    {
    	$order= new rute_user;
    	$order->rute_id = $request->rute_id;
    	$order->user_id = Auth::user()->id;
    	$order->kode = Str::random(8);
    	$order->nomer_kursi = rute_user::where('rute_id','=',$request->rute_id)->max('nomer_kursi')+1;
    	$order->save();
    	return redirect('milikmu');
    }
}
