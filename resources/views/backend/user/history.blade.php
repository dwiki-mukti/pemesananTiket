@extends('layouts.backend')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/data_user">Users</a></li>
          <li class="breadcrumb-item active">Detail User</li>
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
        <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-secondary text-lg">
                          {{$penumpang->role}}
                        </div>
                      </div>
              <div class="widget-user-header bg-info">
                <!-- <div style="right: 20px; padding: 0 10px; background-color: #69c3d1; position: absolute;">Petugas</div> -->
                <h3 class="widget-user-username">{{$penumpang->name}}</h3>
                <h5 class="widget-user-desc">{{$penumpang->email}}</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
              </div>
              <div class="card-footer bg-white">
                <div class="">
                  <div class="text-center">
                    <div class="description-block">
                      <h5 class="description-header">Saldo</h5>
                      <span>Rp.{{$penumpang->saldo}}</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
        <div class="card">
          <div class="card-header">
            <h4>History</h4>
          </div>
          <div class="card-body">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th>Kode Perjalanan</th>
                  <!-- <th>Unit</th> -->
                  <th>Nomer Kursi</th>
                  <th>Asal</th>
                  <th>Tujuan</th>
                  <th>Preview</th>
                </tr>
              </thead>
              <tbody>
                @foreach($penumpang->rute as $p)
                <tr>
                  <td>{{$p->pivot->kode}}</td>
                  <!-- <td></td> -->
                  <td>{{$p->pivot->nomer_kursi}}</td>
                  <td>
                    <div>{{$p->asal}}</div>
                   <div style="font-size: 12px; color: #28a745;">{{$p->waktu_berangkat}}</div>
                  </td>
                  <td>
                    <div>{{$p->tujuan}}</div>
                   <div style="font-size: 12px; color: #28a745;">{{$p->waktu_tiba}}</div>
                  </td>
                  <td><a href="{{ route('data_rute.show', ['data_rute'=> $p->id]) }}"><i class="fas fa-eye"></i> Preview</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection