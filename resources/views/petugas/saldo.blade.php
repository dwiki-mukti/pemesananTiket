@extends('layouts.app')
@section('isisaldo', 'active')
@section('content')
	<div class="container">
		<div class="mx-auto" style="min-width: 230px; width: 80%; max-width: 600px;">
			<div id="myTogle" style="height: 160px;"></div>
			<form id="formSearch" method="post" onsubmit="event.preventDefault(); myPost();">
				<div class="form-group">
					<div class="text-center">
						<label for="userid">MasukkanUser Id</label>
					</div>
					<div class="input-group">
					  <input type="text" class="form-control" id="kode">
					  <span class="input-group-append">
					    <button type="submit" class="btn btn-primary">
					    	Cari
					    </button>
					  </span>
					</div>
				</div>
			</form>	
			<div id="formSubmit">
				<div class="border-top border-bottom my-4 py-3">
					Username: 
					<span style="font-size: 17px" id="nama">User</span>
				</div>
				<div class="mb-2">
					Isi Saldo Senilai:
				</div>
				<div class="row">
					<div class="col-3 mb-2">
						<button onclick="TopUp(10000);" class="btn btn-outline-primary">Rp.10.000</button>
					</div>
					<div class="col-3 mb-2">
						<button onclick="TopUp(50000);" class="btn btn-outline-primary">Rp.50.000</button>
					</div>
					<div class="col-3 mb-2">
						<button onclick="TopUp(100000);" class="btn btn-outline-primary">Rp.100.000</button>
					</div>
					<div class="col-3 mb-2">
						<button onclick="TopUp(200000);" class="btn btn-outline-primary">Rp.200.000</button>
					</div>
					<div class="col-3 mb-2">
						<button onclick="TopUp(300000);" class="btn btn-outline-primary">Rp.300.000</button>
					</div>
					<div class="col-3 mb-2">
						<button onclick="TopUp(400000);" class="btn btn-outline-primary">Rp.400.000</button>
					</div>
					<div class="col-3 mb-2">
						<button onclick="TopUp(500000);" class="btn btn-outline-primary">Rp.500.000</button>
					</div>
					<div class="col-3 mb-2">
						<button onclick="TopUp(1000000);" class="btn btn-outline-primary">Rp.1.000.000</button>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
<script>
	var p;
	p = $('#formSubmit').children().detach();
	function myPost() {
		$.ajax({
		  	url: "/isisaldo",
		  	type: "POST",
		  	data:{
		  		kode:$("#kode").val(),
		  		_token:'{{csrf_token()}}'
		  	},
		  	success:function(response) {
			  	$('#myTogle').slideUp();
		  		if (response != '') {
			  		$("#formSubmit").html(p);
			  		$('#nama').html(response.name);
			  		id = response.id;
		  		}else{
			  		$("#formSubmit").html('<div class="mid-notif-danger mt-4">Data Tidak Di Temukan</div>');
		  		}
		  	}
		  })
	}
	function TopUp(nilai) {
		$('#nilai').val(nilai);
		$('#TopUp').attr('action','/isisaldo/'+id);
		$('#TopUp').submit();
	}
</script>
<form method="post" action="#" id="TopUp">
	@csrf
	@method('PUT')
	<input type="hidden" name="nilai" id="nilai">
</form>
@endsection

@section('css')
<style>
  .mid-notif-danger{
    background-color: #dc35453b;
    color: #dc3545;
    text-align: center;
    padding: .6rem 0;
    margin: .5rem 0;
  }
  .mid-notif-success{
    background-color: #28a7453b;
    color: #28a745;
    text-align: center;
    padding: .6rem 0;
    margin: .5rem 0;
  }
</style>
@endsection
