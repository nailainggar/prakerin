@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            Tambah Data 
            </div>
                 <div class="card-body">
                    <form action="{{route('kasus2.store')}}" method="post">
                      @csrf 
                      <div class="col">
                          <livewire:dropdowns/>
                        
                    <div class="form-group">
                      <label for="">Positif</label>
                      <input type="text"  name="positif" class="form-control">
                      @if($errors->has('positif'))
                            <span class="text-danger">{{ $errors->first('positif') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="">Sembuh</label>
                      <input type="text"  name="sembuh"  class="form-control">
                      @if($errors->has('sembuh'))
                            <span class="text-danger">{{ $errors->first('sembuh') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="">Meninggal</label>
                      <input type="text"  name="meninggal"  class="form-control">
                      @if($errors->has('meninggal'))
                            <span class="text-danger">{{ $errors->first('meninggal') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="">Tanggal</label>
                      <input type="date"  name="tanggal"  class="form-control">
                      @if($errors->has('tanggal'))
                            <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                        @endif
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