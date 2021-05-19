@extends('datahps.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Kelola Data HP</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('datahps.create') }}"> Tambah Data</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Merk HP</th>
            <th>Tipe HP</th>
            <th>Tahun Produksi</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($datahps as $datahp)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $datahp->merk_hp }}</td>
            <td>{{ $datahp->tipe_hp }}</td>
            <td>{{ $datahp->thn_produksi }}</td>
            <td>
                <form action="{{ route('datahps.destroy',$datahp->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('datahps.edit',$datahp->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $datahps->links() !!}
      
@endsection