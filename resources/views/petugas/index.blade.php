@extends('layouts.app')
@section('checkin', 'active')
@section('content')
	<div class="container">
		<div class="mx-auto" style="min-width: 230px; width: 80%; max-width: 550px;">
			<div class="card">
				<div class="card-body p-5">
					<div class="mb-5 mt-3 mx-auto text-center">
						<div style="font-size: 25px;">checkin</div>
						<div style="color: #ff8b00!important; font-weight: 900; font-size: 40px;">oM-Tiket</div>
					</div>
					<form method="get" action="{{Route('checkin')}}">
						<!-- @csrf -->
						<div class="form-group mt-4 mb-0">
							<label for="kodeTiket">Masukkan Kode Tiket</label>
							<input name="kode" type="text" class="form-control" id="kodeTiket" placeholder="Kode Tiket">
						</div>
	@if(Session::has('gagal'))
<b class="text-danger">Data Tidak Di Temukan</b>
	@else
<br>
	@endif
						<div class="text-center">
							<button class="btn btn-primary" style="padding: 5px 30px;">Cari</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script>
	@if(Session::has('sukses'))
		toastr.success('{{Session::get("sukses")}}', 'Berhasil!');
  		swal("Berhasil", "{{Session::get('sukses')}}", "success");
	@endif
	@if(Session::has('gagal'))
		toastr.error("{{Session::get('gagal')}}", 'Gagal');
  		swal("Gagal", "{{Session::get('gagal')}}", "warning");
	@endif
	</script>
@endsection