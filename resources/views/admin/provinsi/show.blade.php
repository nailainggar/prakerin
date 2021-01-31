@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            Lihat Data Provinsi
            </div>
                <div class="card-body">
                    <div class="form-group">
                      <label for="">Kode Provinsi</label>
                      <input type="text" class="form-control" name="kode_provinsi" value="{{$provinsi->kode_provinsi}}" required>
                    </div>
                    <div class="form-group">
                      <label for="">Nama Provinsi</label>
                      <input type="text" class="form-control" name="nama_provinsi" value="{{$provinsi->nama_provinsi}}" required>
                    </div>
                      </div>
                    </form>
                </div>
             </div>
        </div>
</div>
@endsection