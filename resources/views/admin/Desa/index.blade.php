@extends('layouts.admin')
@section('content')
<div class="container">
    <div  class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        Data Desa
                <a href="{{route('desa.create')}}" class="btn btn-primary float-right">
                         Tambah
                </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Kode Desa</th>
                            <th>Desa</th>
                            <th>Aksi</th>
                        </tr>
                        @php $no=1; @endphp
                        @foreach($desa as $data)
                        <tr> 
                            <td>{{$no++}}</td>
                            <td>{{$data->kode_desa}}</td>
                            <td>{{$data->nama_desa}}</td>
                            <td>
                            <form action="{{route('desa.destroy',$data->id)}}" method="post">
                            @method('delete')
                            @csrf 
                            <a href="{{route('desa.edit' ,$data->id)}}" class="btn btn-success">Edit</a>
                            <a href="{{route('desa.show' ,$data->id)}}" class="btn btn-warning">Show</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                     </table>
                 </div>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection