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
          <li class="breadcrumb-item active">Perjalanan Kereta</li>
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
              <h3>Data Perjalanan Kereta</h3>
              <a href="{{route('riwayatPerjalanan',['key'=>'kereta'])}}" style="text-decoration: underline !important;"><i style="margin-left: 2px; font-size: 13px" class="fas fa-history"></i> Riwayat</a>
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


              <a href="{{ route('data_rute.create', ['tipe'=> 'kereta']) }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Add Data</a>
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
                   <div style="font-size: 12px; color: #28a745;">Kelas {{$r->transportasi->kelas}} {{$r->kursi}} kursi</div>
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
                    <a href="{{ route('data_rute.show', ['data_rute'=> $r->id]) }}">preview</a> |
                    <a href="{{ route('data_rute.edit', ['data_rute'=> $r->id]) }}">edit</a> |
                    <a class="text-danger" href="#"
                       onclick="event.preventDefault();
                                     $(this).siblings('form').submit();">
                        delete
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