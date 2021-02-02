@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                @endif
                <div class="card">
                    <div class="card-header">
                    <center><b>{{ __('Data Kasus ') }}</b></center>
                    </div>
                    
                    <div class="card-body">
                            <div class="form-group">
                                <label for="">Provinsi</label>
                                <input type="text" name="nama_provinsi" class="form-control" id="exampleInputPassword1" value="{{$kasus2->rw->desa->kecamatan->kota->provinsi->nama_provinsi}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Kota</label>
                                <input type="text" name="nama_kota" class="form-control" id="exampleInputPassword1" value="{{$kasus2->rw->desa->kecamatan->kota->nama_kota}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Kecamatan</label>
                                <input type="text" name="nama_kecamatan" class="form-control" id="exampleInputPassword1" value="{{$kasus2->rw->desa->kecamatan->nama_kecamatan}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Desa</label>
                                <input type="text" name="desa" class="form-control" id="exampleInputPassword1" value="{{$kasus2->rw->desa->nama_desa}}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Positif</label>
                                <input type="text" name="positif" class="form-control" id="exampleInputPassword1"  value="{{ $kasus2->positif }}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Sembuh</label>
                                <input type="text" name="sembuh" class="form-control" id="exampleInputPassword1"  value="{{ $kasus2->sembuh }}" readonly>  
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Meninggal</label>
                                <input type="text" name="meninggal" class="form-control" id="exampleInputPassword1"  value="{{ $kasus2->meninggal }}" readonly>  
                            </div>
                            <div class="form-group">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1"  value="{{ $kasus2->tanggal }}"readonly>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection