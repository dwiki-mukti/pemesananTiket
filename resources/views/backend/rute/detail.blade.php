@extends('layouts.backend')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/perjalanan/pesawat">Perjalanan {{$rute->transportasi->tipe}}</a></li>
          @if(!is_null($rute->deleted_at))
            <li class="breadcrumb-item"><a href="/perjalanan/pesawat/riwayat">History</a></li>
          @endif
          <li class="breadcrumb-item active">Detail Transportasi</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-6">
      	<div class="card">
      		<div class="card-body">
      			<div>
                <h4>{{$rute->transportasi->nama}}</h4>
                <h6>Kelas {{$rute->transportasi->kelas}} isi {{$rute->transportasi->kursi}} kursi</h6>
      			</div>
      			<br>
      			<div class="d-flex">		
      				<div style="font-size: 18px;">
      					Priece: Rp.{{$rute->harga}}
      				</div>
      				<div class="ml-auto">
      					Tersedia: {{$rute->kursi-count($rute->user)}} Kursi
      				</div>
      			</div>	
      		</div>
      	</div>
      </div>
      <div class="col-6">
      	<div class="card pb-2">
      		<div class="card-header">
      			<h3 class="card-title">Perjalanan</h3>
      		</div>
      		<div class="card-body">

  	<div class="px-4">
	  	<div class="d-flex" style="justify-content: space-between;">
	  		<div>Bandara Solo</div>
	  		<div>Bandara Jakarta</div>
	  	</div>
		  	<div class="d-flex mx-auto" style="width: 85%; line-height: 10px;">
		  		<div style="height: 10px; width: 10px;  border: solid 1px grey;  border-radius: 50%;"></div>
		  		<div style="height: 1px; width: 100%; background-color: grey; margin-top: 5px;"></div>
		  		<div style="height: 10px; width: 10px; background-color: grey; border-radius: 50%;"></div>
		  	</div>
	  	<div class="d-flex" style="justify-content: space-between;">
	  		<div>02-05-2019</div>
	  		<div>02-05-2019</div>
	  	</div>
  	</div>

      		</div>
      	</div>
      </div>
    </div>
        <div class="card">
          <div class="card-header d-flex">
            <h4>Daftar Penumpang</h4>
            <div style="font-size: 20px;" class="ml-auto">Jumlah Penumpang: {{count($rute->user)}}</div>
          </div>
          <div class="card-body">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Kode Perjalanan</th>
                  <th>Nomer Kursi</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($rute->user as $user)
              	<td><a href="{{route('data_user.show', ['data_user'=> $user->id])}}">{{$user->name}}</a></td>
              	<td>{{$user->pivot->kode}}</td>
              	<td>{{$user->pivot->nomer_kursi}}</td>
              	@endforeach
              </tbody>
             </table>
          </div>
        </div>
  </div>
</section>

@endsection