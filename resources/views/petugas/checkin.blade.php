@extends('layouts.app')
@section('checkin', 'active')
@section('content')
	<div class="container text-secondary vertical-align-wrap" style="height: 100%;">
		<div class="card mt-2">
			<div class="card-body"> 

<div class="row px-5 py-2">
  <div class="col-md-5">
    <div class="mt-3">
      <div style="font-weight: 600; font-size: 20px;">{{$tiket->user->name}}</div>
      <div>
        Kursi Nomer {{$tiket->nomer_kursi}}
      </div>
      <br><br>
      <div class="d-flex">
      	<div class="ml-auto" style="font-size: 19px; line-height: 1px;">
			{{$tiket->kode}}
		</div>
      </div>
    </div>
  </div>
  <div class="col-md-7 border-left">
  	<div class="px-5">
		<div class="mt-3">
		  <div style="font-weight: 600; font-size: 20px; line-height: 18px;">{{$tiket->rute->transportasi->nama}}</div>
		  <div>
		    {{$tiket->rute->transportasi->kelas}}
		  </div>
		  <br>
		</div>
		<div style="line-height: 20px;">
			<div class="d-flex" style="justify-content: space-between;">
				<div>{{$tiket->rute->asal}}</div>
				<div>{{$tiket->rute->asal}}</div>
			</div>
			<div class="d-flex mx-auto" style="width: 85%; line-height: 10px;">
				<div style="height: 10px; width: 10px;  border: solid 1px grey;  border-radius: 50%;"></div>
				<div style="height: 1px; width: 100%; background-color: grey; margin-top: 5px;"></div>
				<div style="height: 10px; width: 10px; background-color: grey; border-radius: 50%;"></div>
			</div>
			<div class="d-flex" style="justify-content: space-between;">
				<div>{{$tiket->rute->waktu_berangkat}}</div>
				<div>{{$tiket->rute->waktu_tiba}}</div>
			</div>
		</div>
  	</div>
  </div>
</div>
			</div>
		</div>

		<div class="text-center mt-4">
			<form method="post" action="{{Route('checkin')}}">
				@csrf
				<input type="hidden" name="kode" value="{{$tiket->kode}}">
				<button class="btn btn-success px-5">Gunakan</button>
			</form>
		</div>
	</div>
@endsection