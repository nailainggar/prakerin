@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            Lihat Data Rw
            </div>
                < div class="card-body">
                    <div class="form-group">
                      <label for="">Kode Rw</label>
                      <input type="text" class="form-control" name="kode_rw" value="{{$rw->kode_rw}}" required>
                    </div>
                    <div class="form-group">
                      <label for="">Rw</label>
                      <input type="text" class="form-control" name="nama_rw" value="{{$rw->nama_rw}}" required>
                    </div>
                      </div>
                    </form>
                </div>
             </div>
        </div>
</div>
@endsection