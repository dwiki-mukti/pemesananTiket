@extends('layouts.backend')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Users</li>
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
            <h3 class="card-title">Title</h3>
          </div>
          <div class="card-body">
            <table class="table table-hover" id="example1">
              <thead>
                <tr>
                  <th style="width: 180px;">KODE PENUMPANG</th>
                  <th>NAMA</th>
                  <th>EMAIL</th>
                  <th>SALDO</th>
                  <th>DETAIL</th>
                </tr>
              </thead>
              <tbody>
                @foreach($penumpang as $p)
                <tr>
                  <td>{{$p->id}}</td>
                  <td>{{$p->name}}</td>
                  <td>{{$p->email}}</td>
                  <td>{{$p->saldo}}</td>
                  <td><a href="{{route('data_user.show', ['data_user'=> $p->id])}}">Detail</a></td>
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