@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            Lihat Data Desa
            </div>
                < div class="card-body">
                    <div class="form-group">
                      <label for="">Kode Desa</label>
                      <input type="text" class="form-control" name="kode_desa" value="{{$desa->kode_desa}}" required>
                    </div>
                    <div class="form-group">
                      <label for="">Nama Desa</label>
                      <input type="text" class="form-control" name="nama_desa" value="{{$desa->nama_desa}}" required>
                    </div>
                      </div>
                    </form>
                </div>
             </div>
        </div>
</div>
@endsection