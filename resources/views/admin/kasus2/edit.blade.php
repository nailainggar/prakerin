@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            Edit Data Kasus
            </div>
                 <div class="card-body">
                    <form action="{{route('kasus2.update'  ,$kasus2->id)}}" method="POST">
                       @method('put')
                        @csrf 
                        <div class="col">
                        @livewire('dropdowns', ['selectedRw'=>$kasus2->id_rw, 'selectedDesa'=>$kasus2->rw->id_desa,
                        'selectedKecamatan'=>$kasus2->rw->desa->id_kecamatan, 'selectedKota'=>$kasus2->rw->desa->kecamatan->id_kota,
                        'selectedProvinsi'=>$kasus2->rw->desa->kecamatan->kota->id_provinsi])
                        </div>
                       

                
                    <div class="form-group">
                      <label for="">Positif</label>
                      <input type="text"  name="positif" class="form-control" value="{{$kasus2->positif}}" required>
                    </div>
                    <div class="form-group">
                      <label for="">Sembuh</label>
                      <input type="text"  name="sembuh"  class="form-control" value="{{$kasus2->sembuh}}" required>
                    </div>
                    <div class="form-group">
                      <label for="">Meninggal</label>
                      <input type="text"  name="meninggal"  class="form-control" value="{{$kasus2->meninggal}}" required>
                    </div>
                    <div class="form-group">
                      <label for="">Tanggal</label>
                      <input type="date"  name="tanggal"  class="form-control" value="{{$kasus2->tanggal}}" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </div>
                    </form>
                </div>
             </div>
      
@endsection