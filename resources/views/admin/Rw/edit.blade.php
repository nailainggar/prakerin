@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            Edit Data Rw
            </div>
                 <div class="card-body">
                    <form action="{{route('rw.update'  ,$rw->id)}}" method="post">
                       @method('put')
                        @csrf 
                        <div class ="form-group"><
                          <label for="" > Pilih Desa</label>
                          <select name="id_desa"  class=" form-control " require>
                          @foreach($desa as $data)
                          <option value="{{$data->id}}"> {{$data->nama_desa}} </option>
                          @endforeach
                        </select></div>
                         
                    <div class="form-group">
                      <label for="">Kode Rw</label>
                      <input type="text" class="form-control" name="kode_rw" value="{{$rw->kode_rw}}" required>
                    </div>
                    <div class="form-group">
                      <label for="">Rw</label>
                      <input type="text" class="form-control" name="nama_rw" value="{{$rw->nama_rw}}" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </div>
                    </form>
                </div>
             </div>
      
@endsection