@extends('layouts.frontend')
@section('content')


<div class="bg-light py-5">
	<div class="container">

    @foreach($users->rute as $rute)
		<div class="card mt-2 {{$rute->pivot->deleted_at ? 'terpakai' : ''}}">
			<div class="card-body"> 
        <div class="row px-5">
          <div class="col-md-5 mt-1">
              <div class="float-left"> <!-- class="d-inline-block"> -->
                <div class="tiket-title">{{$rute->transportasi->nama}}</div>
                <div style="font-size: 0.9rem">Kursi Nomer:</div>
                <div style="font-size: 1.5rem; font-style: bold; margin-bottom: 0.75rem">{{$rute->pivot->nomer_kursi}}</div>
              </div>
              <div class="float-right text-center">
                <div style="height: 100px; width: 100px; background-color: grey;"></div>
                <div style="font-size: 0.8rem;">{{$rute->pivot->kode}}</div>
              </div>
          </div>
          <div class="col-md-7 border-left px-5 pt-3">
        	  	<div class="d-flex justify-content-between">
        	  		<div>{{$rute->asal}}</div>
        	  		<div>{{$rute->tujuan}}</div>
        	  	</div>
        		  	<div class="d-flex mx-auto cover-line">
        		  		<div class="little-circle little-circle-clear"></div>
        		  		<div class="line-time"></div>
        		  		<div class="little-circle little-circle-dark"></div>
        		  	</div>
        	  	<div class="d-flex justify-content-between">
        	  		<div>{{$rute->waktu_berangkat}}</div>
        	  		<div>{{$rute->waktu_tiba}}</div>
        	  	</div>
                <div style="font-size: 0.8rem; float: right;">
                  <br>
                  Kelas: <span style="font-style: italic;">{{$rute->transportasi->kelas}}</span></div>

          </div>
        </div>
			</div>
		</div>
    @endforeach

	</div>
</div>


@endsection





@section('css')

<style>
  .terpakai:before{
    content: '';
    position: absolute;
    height: 100%;
    width: 100%;
    background: #e9ecef;
  }
  .cover-line{
    width: 85%;
    line-height: 10px;
  }
  .line-time{
    height: 1px;
    width: 100%;
    background-color: grey;
    margin-top: 5px;
  }
  .little-circle{
    height: 10px;
    width: 10px;
    border: solid 1px grey;
    border-radius: 50%;
  }
  .little-circle-clear{
    border: solid 1px grey;
  }
  .little-circle-dark{
    background-color: grey;
  }


  .tiket-title{
    font-weight: 600;
    font-size: 20px;
    line-height: 18px;
  }

</style>
@endsection