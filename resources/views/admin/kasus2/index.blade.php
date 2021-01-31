@extends('layouts.admin')
@section('content')
<div class="container">
    <div  class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        Data Kasus2
                <a href="{{route('kasus2.create')}}" class="btn btn-primary float-right">
                         Tambah
                </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Rw</th>
                            <th>Positif</th>
                            <th>Sembuh</th>
                            <th>Meninggal</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                        @php $no=1; @endphp
                        @foreach($kasus2 as $data)
                        <tr> 
                            <td>{{$no++}}</td>
                            <td>{{$data->rw->nama_rw}}</td>
                            <td>{{$data->positif}}</td>
                            <td>{{$data->sembuh}}</td>
                            <td>{{$data->meninggal}}</td>
                            <td>{{$data->tanggal}}</td>
                            <td>
                            <form action="{{route('kasus2.destroy',$data->id)}}" method="post">
                            @method('delete')
                            @csrf 
                            <a href="{{route('kasus2.edit' ,$data->id)}}" class="btn btn-success">Edit</a>
                            <a href="{{route('kasus2.show' ,$data->id)}}" class="btn btn-warning">Show</a>
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