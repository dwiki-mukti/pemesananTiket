@extends('layouts.backend')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
<!--       <div class="col-sm-6">
        <h1>Fixed Layout</h1>
      </div> -->
      <div class="col-sm-6">
        <ol class="breadcrumb "><!-- float-sm-right -->
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Layout</a></li>
          <li class="breadcrumb-item active">Fixed Layout</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <div class="d-inline-block">
              <h3>Form create data perjalanan {{$rute->tipe}}</h3>
            </div>
          </div>
          <div class="card-body">
          	<form method="post" action="{{ route('data_rute.update', ['data_rute'=> $rute->id]) }}">
          		@csrf
          		@method('put')
          		<div class="row">
          			<div class="col-sm-5">
        <div class="form-group">
          <label for="id">Transportasi</label>
          <input name="transportasi_id" type="hidden" id="id-input" required value="{{$rute->transportasi_id}}">
          <div class="form-control" data-target="#modal-default" data-toggle="modal" id="id">{{$rute->transportasi->nama}}</div>
        </div>
						<div class="form-group">
							<label for="asal">Asal</label>
							<input required autocomplete="off" name="asal" class="form-control" id="asal" value="{{$rute->asal}}" placeholder="Tempat Keberangkatan">
						</div>
						<div class="form-group">
							<label for="tujuan">Waktu Keberangkatan</label>
							<input required type="datetime-local" name="waktu_berangkat" value="{{$rute->waktu_berangkat}}" class="form-control" placeholder="Waktu Keberangkatan">
						</div>
          			</div>
          			<div class="col-sm-1"></div>
          			<div class="col-sm-5">
        <div class="form-group">
          <label for="id-kursi">Jumlah Kursi</label>
          <input name="kursi" type="number" id="id-kursi" required value="{{$rute->kursi}}" class="form-control">
        </div>
						<div class="form-group">
							<label for="tujuan">Tujuan</label>
							<input required autocomplete="off" name="tujuan" class="form-control" value="{{$rute->tujuan}}" id="tujuan" placeholder="Tempat Tujuan">
						</div>
						<div class="form-group">
							<label for="tujuan">Waktu Tiba</label>
							<input value="{{$rute->waktu_tiba}}" required type="datetime-local" name="waktu_tiba" class="form-control" placeholder="Waktu Tiba">
						</div>
          			</div>
          		</div>

				<div class="form-group">
					<label for="harga">Harga</label>
					<input required type="number" value="{{$rute->harga}}" name="harga" class="form-control" id="harga" placeholder="Harga" autocomplete="off">
				</div>
				<div class="text-center">
					<button class="btn btn-primary px-5 py-2 my-4">Submit</button>
				</div>
          	</form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>

























      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
          		<h5>Pilih Transportasi Yang Ingin Di Gunakan</h5>
			  <i class="fas fa-spin fa-spinner" style="margin: 12px 0 0 -27px; display: none;"></i>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
          	<div class="p-3 bg-light">
			  <input class="form-control pr-4" id="search" placeholder="Search Name or Id Transportasi" autocomplete="off" autofocus>
          	</div>
            <div class="mb-1" id="modal-body">

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

@endsection

@section('js')
<script>
	
  $(document).ready(function(){
// live-seacrh
	function search(keyword) {
			var token = '{{csrf_token()}}';
			var tipe = '{{$rute->tipe}}';
		  $.ajax({
		  	url: "/ajax-request",
		  	type: "POST",
		  	data:{
		  		keyword:keyword,
          tipe:tipe,
		  		_token:token,
		  		_method:"PUT"
		  	},
		  	success:function(response) {
		  		$('.fa-spin').css('display','block');
		  		$('#modal-body').html(response);
		  		$('.fa-spin').css('display','none');
		  	}
		  })
	}
  	// ====================
  	$('#id').click(function() {
  		search('');
  	});
  	// ====================
	$("#search").keyup(function(){
		if ($("#search") == "") {
			search(false);
		}else{
			search($("#search").val());
		}

	}); 
 //end live-search 

 // ====batas=====
  }); 

</script>
@endsection

@section('css')
<style>
	.item-transportasi{
		cursor: pointer;
	}
	.item-transportasi:hover{
		    background-color: #f8f9fa;
	}
</style>
@endsection