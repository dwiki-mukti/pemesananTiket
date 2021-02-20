@extends('layouts.backend')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
<!--       <div class="col-sm-6">
        <h1>Data Unit Transportasi</h1>
      </div> -->
      <div class="col-sm-6">
        <ol class="breadcrumb"> <!-- float-sm-right -->
          <li class="breadcrumb-item active">Unit Transportasi</li><!-- 
          <li class="breadcrumb-item"><a href="#">Layout</a></li>
          <li class="breadcrumb-item active">Fixed Layout</li> -->
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
            <h3 class="float-left">Data Unit Transportasi</h3>

<!--               <ul class="nav nav-pills d-inline-flex">
                <li class="nav-item">
                  <a class="nav-link" href="#tab_1" data-toggle="tab">All</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="#tab_2" data-toggle="tab">Kereta</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#tab_3" data-toggle="tab">Pesawat</a>
                </li>
              </ul> -->

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
              <div class="btn btn-success m-1" data-target="#modal-default" data-toggle="modal">
                <i class="fas fa-plus"></i> Add New Data
              </div>
            </div>
          </div>
          <div class="card-body">
              <table id="example1" class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                  <th>Jenis</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Jumlah Kursi</th>
                  <th style="width: 120px;">Ready to use</th>
                  <th>Tools</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($transportasi as $t)
                <tr>
                  <td class="jenis">{{$t->tipe}}</td>
                  <td class="nama">{{$t->nama}}</td>
                  <td class="kelas">{{$t->kelas}}</td>
                  <td class="kursi">{{$t->kursi}}</td>
                    @if($t->ready)
                    <td class="text-center text-success">
                        <i class="fas fa-check "></i> yes
                    </td>
                    @else
                    <td class="text-center text-danger">
                        <i class="fas fa-times"></i> no
                    </td>
                    @endif
                  <td>
                    <a href="{{route('transportasi.show', ['transportasi'=> $t->id])}}" class="text-primary"><i class="fas fa-eye"></i></a>
                    <a  class="text-warning edit"  myId="{{$t->id}}" data-target="#modal-default" data-toggle="modal">
                      <i class="fas fa-edit"></i> 
                    </a>

                    @if($t->ready)
                    <form method="post" action="{{route('transportasi.destroy', ['transportasi'=> $t->id])}}" class="d-inline-flex">
                      @csrf
                      @method('delete')
                      <button type="submit" class="text-danger bg-transparent p-0" style="border: none;"><i class="fas fa-trash"></i></button>
                    </form>
                    @endif
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





      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create New Unit Transportasi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

      <form method="post" action="{{route('transportasi.store')}}" id="form">
        <div class="modal-body">
          {{csrf_field()}}
          <label>Nama transportasi</label>
          <input required type="text" name="nama" class="form-control" id="nama">
          <br>
          <label>Tipe</label>
          <select class="form-control" name="tipe" required>
            <option id="tipe"></option>
            <option value="kereta">Kereta</option>
            <option value="pesawat">Pesawat</option>
          </select>
          <br>
          <label>Kelas</label>
          <select class="form-control" name="kelas" required>
            <option id="kelas"></option>
            <option value="ekonomi">Ekonomi</option>
            <option value="executive">Executive</option>
            <option value="bussiness">Bussiness</option>
          </select>
          <br>
          <label>Jumlah Kursi</label>
          <input required type="number" name="kursi" class="form-control" id="kursi">
        </div>

        <div class="modal-footer justify-content-between">
          <button class="btn btn-primary btn-lg" type="submit">submit</button>
        </div>

      </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection

@section('js')

<script>
  $('.edit').click(function() {
    var id = $(this).attr('myId');


    $('#form').attr('action','/transportasi/'+id);

    $('#nama').prepend('<input type="hidden" name="_method" value="PUT">');

    function ambil(posisi, selection) {
      return posisi.parentsUntil('tbody').children('.'+selection).text();
    }
    $('#nama').val(ambil($(this),'nama'));
    $('#kursi').val(ambil($(this),'kursi'));
    var tipe = ambil($(this),'jenis');
    $('#tipe').text(tipe).val(tipe);
    var kelas = ambil($(this),'kelas');
    $('#kelas').text(kelas).val(kelas);

  })
</script>



@endsection