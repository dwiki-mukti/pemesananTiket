@extends('layouts.frontend')
@section('content')


      <div class="ftco-blocks-cover-1">
        <div class="ftco-cover-1 overlay" style="background-image: url('https://source.unsplash.com/pSyfecRCBQA/1920x780')">
          
        </div>

      <div class="bg-light mt-m-70" style="padding-bottom: 7rem;" id="team-section">
        <div class="container">


           <div class="card">
           	<div class="card-body">
           <div class="row mt-3 mb-4 justify-content-center">
            <div class="col-md-7 text-center">
              <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                <h2 style="font-size: 2.8rem;">Daftar Penerbangan Pesawat</h2>
              </div>
            </div>
           </div>

              <table id="example1" class="table table-hover">
                
                <thead>
                  <tr>
                    <th>NAMA KERETA</th>
                    <th>ASAL</th>
                    <th>TUJUAN</th>
                    <th>HARGA</th>
                    <th>MORE</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($rute as $p)
                    <tr>
                      <td>
                        <div style="line-height: 10px;">{{$p->transportasi->nama}}</div>
                        <small class="text-secondary" style="color: #ff8b00!important;">kelas {{$p->transportasi->kelas}}</small>
                      </td>
                      <td>
                        <div style="line-height: 10px;">{{$p->asal}}</div>
                        <small class="text-secondary">{{$p->waktu_berangkat}}</small>
                      </td>
                      <td>
                        <div style="line-height: 10px;">{{$p->tujuan}}</div>
                        <small class="text-secondary">{{$p->waktu_tiba}}</small>
                      </td>
                      <td>Rp.{{$p->harga}}</td>
                      <td><a href="/preview/{{$p->id}}">Preview</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           	</div>	
           </div>

          </div>
        </div>
      </div>


@endsection