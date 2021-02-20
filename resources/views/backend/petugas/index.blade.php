@extends('layouts.backend')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Petugas</li>
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
            <h3 class="float-left">Petugas</h3>
            <div class="card-tools">
            	<a href="data_petugas/create" class="btn btn-success">
            		<i class="fas fa-plus"></i> Add New
            	</a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-hover" id="example1">
              <thead>
                <tr>
                  <th style="width: 180px;">ID</th>
                  <th>NAMA</th>
                  <th>EMAIL</th>
                  <th>MORE</th>
                </tr>
              </thead>
              <tbody>
                @foreach($petugas as $p)
                <tr>
                  <td>{{$p->id}}</td>
                  <td>{{$p->name}}</td>
                  <td>{{$p->email}}</td>
                  <td>
                    <a href="{{route('data_user.show', ['data_user'=> $p->id])}}"><i class="fas fa-eye"></i></a>
                     | 
                     <a href="#" onclick="event.preventDefault(); myConfirm('{{$p->id}}','{{$p->name}}')" class="text-danger"><i class="fas fa-trash"></i></a>
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

@section('js')
<script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
  <script>
    function myConfirm(id, nama) {
      swal({
        title: "Anda Yakin?",
        text: "Menghapus "+nama+" dari Daftar Perugas",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $('#myForm').attr('action',"/data_petugas/"+id);
          $('#myForm').submit();
        }
      });
    }
  </script>

  <form method="post" action="" id="myForm">
    @csrf
    @method('delete')
  </form>
@endsection
