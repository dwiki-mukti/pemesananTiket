@extends('layouts.backend')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb "><!-- float-sm-right -->
          <li class="breadcrumb-item"><a href="/data_petugas">Petugas</a></li>
          <li class="breadcrumb-item active">Add New Member</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-8">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <form onsubmit="event.preventDefault(); myPost();" method="post">
              <div class="form-group">
                <label for="name">Search User by ID</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" id="id_user" type="number" required placeholder="ID User">
                  <div class="input-group-append">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div  id="return">
            <div class="mt-2 pt-2 card-body">
              <div class="mid-notif-success">
                User Di Temukan!
              </div>
              <div class="py-2" style="font-size: 15px;">
                Id User: <span id="tv_id"></span>
                <br>
                Nama: <span id="nama"></span>
                <br>          
                Email : <span id="email"></span>                
              </div>
              <div>
                Jadikan User Tersebut Sebagai Petugas?
              </div>
            </div>
            <div class="card-footer">
              <form class="d-inline" method="post" action="{{ route('data_petugas.update', ['data_petuga'=> '2']) }}">
                @csrf
                @method('put')
                <input type="hidden" name="id" id="id">
                <button class="btn btn-primary px-4" id="submit">Ya</button>
              </form>
              <button class="btn btn-outline-danger" id="cancel">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script>
    var p;
    p=$('#return').children().detach();
  function myPost() {
    $.ajax({
        url: "/data_petugas",
        type: "POST",
        data:{
          id:$('#id_user').val(),
          _token:'{{csrf_token()}}'
        },
        success:function(response) {
          if (response !== '') {
            $('#return').html(p)
            $('#nama').html(response.name);
            $('#email').html(response.email);
            $('#tv_id').html(response.id);
            $('#id').val(response.id);
          }else{
            $('#return').html('<div class="mid-notif-danger mx-3 my-5">Tidak Ada Data</div>');
          }
          
        }
      })

  } 
</script>
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