@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            Edit Data Kecamatan
            </div>
                 <div class="card-body">
                    <form action="{{route('kecamatan.update'  ,$kecamatan->id)}}" method="post">
                       @method('put')
                        @csrf 
                        <div class ="form-group"><
                          <label for="" > Pilih Kota</label>
                          <select name="id_kota"  class=" form-control " require>
                          @foreach($kota as $data)
                          <option value="{{$data->id}}"> {{$data->nama_kota}} </option>
                          @endforeach
                        </select></div>
                         
                    <div class="form-group">
                      <label for="">Kode Kecamatan</label>
                      <input type="text" class="form-control" name="kode_kecamatan" value="{{$kecamatan->kode_kecamatan}}" required>
                    </div>
                    <div class="form-group">
                      <label for="">Nama Kecamatan</label>
                      <input type="text" class="form-control" name="nama_kecamatan" value="{{$kecamatan->nama_kecamatan}}" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </div>
                    </form>
                </div>
             </div>
      
@endsection