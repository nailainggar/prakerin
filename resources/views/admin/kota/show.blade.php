@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            Lihat Data Provinsi
            </div>
                < div class="card-body">
                    <div class="form-group">
                      <label for="">Kode Kota</label>
                      <input type="text" class="form-control" name="kode_kota" value="{{$kota->kode_kota}}" required>
                    </div>
                    <div class="form-group">
                      <label for="">Nama Kota</label>
                      <input type="text" class="form-control" name="nama_kota" value="{{$kota->nama_kota}}" required>
                    </div>
                      </div>
                    </form>
                </div>
             </div>
        </div>
</div>
@endsection