@extends('layouts.backend')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb "> <!-- float-sm-right -->
          <li class="breadcrumb-item"><a href="{{route('perjalanan',['key'=>strtolower($tipe)])}}">Perjalanan {{$tipe}}</a></li>
          <li class="breadcrumb-item active">History</li>
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
              <h3>Riwayat Perjalanan {{$tipe}}</h3>
            </div>

            <div class="card-tools">
              <a href="#" class="btn btn-outline-primary"
                  onclick="event.preventDefault();
                  $(this).siblings('form').submit();">
                        <i class="fas fa-sync-alt"></i>
              </a>
              <form action="/sync" method="POST" class="d-none">
                  @csrf
                  @method('POST')
              </form>
            </div>
          </div>
          <div class="card-body">
              <table id="example1" class="table table-hover table-condensed table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Asal</th>
                  <th>Tujuan</th>
                  <th>Harga</th>
                  <th>Tools</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rute as $r)
                <tr>
                	<td>
                   <div>{{$r->transportasi->nama}}</div> 
                   <div style="font-size: 12px; color: #28a745;">Kelas {{$r->transportasi->kelas}} {{$r->transportasi->kursi}} kursi</div>
                  </td>
                	<td>
                   <div>{{$r->asal}}</div>
                   <div style="font-size: 12px; color: #28a745;">{{$r->waktu_berangkat}}</div>
                  </td>
                	<td>
                    <div>{{$r->tujuan}}</div> 
                    <div style="font-size: 12px; color: #28a745;">{{$r->waktu_tiba}}</div>
                  </td>
                	<td>{{$r->harga}}</td>
                  <td>
                    <a href="{{ route('data_rute.show', ['data_rute'=> $r->id]) }}"><i class="fas fa-eye"></i> preview</a>
                    <a class="text-danger" href="#"
                       onclick="event.preventDefault();
                                     $(this).siblings('form').submit();">
                        <i class="fas fa-trash"></i> Delete Permanent
                    </a>

                    <form action="{{ route('data_rute.destroy', ['data_rute'=> $r->id]) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                  </td>
                </tr>
                @endforeach
	            </tbody>
	         </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>

@endsection