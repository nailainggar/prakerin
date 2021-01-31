@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            Lihat Data Kecamatan
            </div>
                <div class="card-body">
                    <div class="form-group">
                      <label for="">Kode Kecamatan</label>
                      <input type="text" class="form-control" name="kode_kecamatan" value="{{$kecamatan->kode_kecamatan}}" required>
                    </div>
                    <div class="form-group">
                      <label for="">Nama Kecamatan</label>
                      <input type="text" class="form-control" name="nama_kecamatan" value="{{$kecamatan->nama_kecamatan}}" required>
                    </div>
                      </div>
                    </form>
                </div>
             </div>
        </div>
</div>
@endsection