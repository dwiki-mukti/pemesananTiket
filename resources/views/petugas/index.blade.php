@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="mx-auto" style="min-width: 230px; width: 80%; max-width: 550px;">
			<div class="card">
				<div class="card-body p-5">
					<div style="height: 200px; width: 200px;" class="bg-dark mb-5 mx-auto"></div>

					<div class="form-group mt-4">
						<label for="kodeTiket">Masukkan Kode Tiket</label>
						<input type="text" class="form-control" id="kodeTiket" placeholder="Kode Tiket">
					</div>
					<div class="text-center">
						<button class="btn btn-primary" style="padding: 5px 30px;">Cari</button>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script>
	@if(Session::has('sukses'))
		toastr.success('{{Session::get("sukses")}}', 'Berhasil!');
  		//swal("Berhasil", "{{Session::get('sukses')}}", "success");
	@endif
	@if(Session::has('gagal'))
		toastr.error("{{Session::get('gagal')}}", 'Gagal');
  		// swal("Gagal", "{{Session::get('gagal')}}", "warning");
	@endif
	</script>
@endsection