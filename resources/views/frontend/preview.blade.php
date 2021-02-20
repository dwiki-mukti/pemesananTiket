@extends('layouts.frontend')



@section('content')


<div class="content-wrapper bg-light py-5">
      <!-- Main content -->
    <section class="content">
      <div class="container">
        
        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <div class="card">
              <div class="card-body">
                
<div class="row">
  <div class="col-md-4">
    <div style="margin: 70px 0 0 40px;">
      <div style="font-weight: 600; font-size: 20px; line-height: 18px;">{{$rute->transportasi->nama}}</div>
      <div>
        Kelas {{$rute->transportasi->kelas}}
      </div>
      <div style="font-size: 18px; margin-top: 15px;">
        Rp.{{$rute->harga}},-
      </div>

      <div class="text-center">
        <form method="post" action="{{ route('milikmu') }}">
          @csrf
          <input type="hidden" name="rute_id" value="{{$rute->id}}">
          <button type="submit" class="btn btn-primary text-white mt-4">Order</button>
        </form>
      </div>

    </div>
  </div>
  <div class="col-md-8 border-left">
    
            <div class="timeline" style="margin-top: 30px;">
              
              <div>
                <i class="fas fa-flag text-white"></i>
                <div class="timeline-item">
                  <h3 class="timeline-header">Berangkat Dari</h3>
                  <div class="timeline-body">
                    <div>{{$rute->asal}}</div>
                    <div>{{$rute->waktu_berangkat}}</div>
                  </div>
                </div>
              </div>

              <div>
                <i class="fas fa-map-marker-alt bg-success text-white" ></i>
                <div class="timeline-item">
                  <h3 class="timeline-header">tiba di tujuan pada</h3>
                  <div class="timeline-body">
                    <div>{{$rute->tujuan}}</div>
                    <div>{{$rute->waktu_tiba}}</div>
                  </div>
                </div>
              </div>

              
              <div class="time-label">
                <i class="fas fa-coffee bg-primary text-white" ></i>

                <div class="timeline-item" style="border: none; box-shadow: none;">
                <span style="position: absolute; text-transform: uppercase;font-family: 'Oswald', sans-serif;font-weight: 500">
                  Congratulations!
                </span>
                <br>
                <span style="position: absolute;">me</span>
                </div>
              </div>
            </div>
  </div>
</div>


              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->

    </section>
    <!-- /.content -->
</div>


@endsection


@section('css')
<style>
  .timeline {
    margin: 0 0 45px;
    padding: 0;
    position: relative;
}
.timeline::before {
    border-radius: .25rem;
    background: #dee2e6;
    bottom: 0;
    content: '';
    left: 31px;
    margin: 0;
    position: absolute;
    top: 0;
    width: 4px;
}
.timeline>div {
    margin-bottom: 15px;
    margin-right: 10px;
    position: relative;
}
.timeline>div::after, .timeline>div::before {
    content: "";
    display: table;
}
.timeline>.time-label>span {
    border-radius: 4px;
    background-color: #fff;
    display: inline-block;
    font-weight: 600;
    padding: 5px;
}
.timeline>div>.fa, .timeline>div>.fab, .timeline>div>.far, .timeline>div>.fas, .timeline>div>.glyphicon, .timeline>div>.ion {
    background: #adb5bd;
    border-radius: 50%;
    font-size: 15px;
    height: 30px;
    left: 18px;
    line-height: 30px;
    position: absolute;
    text-align: center;
    top: 0;
    width: 30px;
}
.timeline>div>.timeline-item {
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    border-radius: .25rem;
    background: #fff;
    color: #495057;
    margin-left: 60px;
    margin-right: 15px;
    margin-top: 0;
    padding: 0;
    position: relative;
}
.timeline>div>.timeline-item>.time {
    color: #999;
    float: right;
    font-size: 12px;
    padding: 10px;
}
.timeline>div>.timeline-item>.timeline-header {
    border-bottom: 1px solid rgba(0,0,0,.125);
    color: #495057;
    font-size: 16px;
    line-height: 1.1;
    margin: 0;
    padding: 10px;
}
.timeline>div>.timeline-item>.timeline-body, .timeline>div>.timeline-item>.timeline-footer {
    padding: 10px;
}
*, ::after, ::before {
    box-sizing: border-box;
}
</style>
@endsection