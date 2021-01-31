@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            Tambah Data Kecamatan
            </div>
                 <div class="card-body">
                    <form action="{{route('kecamatan.store')}}" method="post">
                      @csrf 
                      <div class ="form-group"
                          <label for="" > Pilih Kota</label>
                          <select name="id_kota"  class=" form-control " require>
                          @foreach($kota as $data)
                          <option value="{{$data->id}}"> {{$data->nama_kota}} </option>
                          @endforeach
                          </select></div>
                          
                    <div class="form-group">
                      <label for="">Kode Kecamatan</label>
                      <input type="text"  name="kode_kecamatan" class="form-control" require>
                      @error('kode_kecamatan')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Nama Kecamatan</label>
                      <input type="text"  name="nama_kecamatan"  class="form-control" require>
                      @error('kode_kecamatan')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </div>
                    </form>
                </div>
             </div>
        </div>
</div>
@endsection