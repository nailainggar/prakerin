@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            Edit Data Desa
            </div>
                 <div class="card-body">
                    <form action="{{route('desa.update'  ,$desa->id)}}" method="post">
                       @method('put')
                        @csrf 
                        <div class ="form-group"><
                          <label for="" > Pilih Kecamatan</label>
                          <select name="id_kecamatan"  class=" form-control " require>
                          @foreach($kecamatan as $data)
                          <option value="{{$data->id}}"> {{$data->nama_kecamatan}} </option>
                          @endforeach
                        </select></div>
                         
                    <div class="form-group">
                      <label for="">Kode Desa</label>
                      <input type="text" class="form-control" name="kode_desa" value="{{$desa->kode_desa}}" required>
                    </div>
                    <div class="form-group">
                      <label for="">Nama Desa</label>
                      <input type="text" class="form-control" name="nama_desa" value="{{$desa->nama_desa}}" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </div>
                    </form>
                </div>
             </div>
      
@endsection