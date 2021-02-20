
@if(count($transportasi) == 0)
	<div>data kosong</div>
@else
	@foreach($transportasi as $t)
	<div class="border-top py-3 px-4 item-transportasi" data-dismiss="modal" data-id="{{$t->id}}" data-kursi="{{$t->kursi}}">
		<b>{{$t->nama}}</b>
		<div>{{$t->jenis}} kelas {{$t->kelas}}</div>
	</div>
	@endforeach
@endif

<script>
	$('.item-transportasi').click(function() {
		var name=$(this).find('b').text();
		var id = $(this).attr('data-id');
		var kursi = $(this).attr('data-kursi');
		$('#id').html(name);
		$('#id-input').val(id);
		$('#id-kursi').val(kursi);
	});
</script>