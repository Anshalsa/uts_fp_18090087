@extends('datahps.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Data HP</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('datahps.index') }}"> Kembali</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Maaf!</strong> Mohon lengkapi data!<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('datahps.update',$datahp->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Merk HP</strong>
                    <input type="text" name="merk_hp" value="{{ $datahp->merk_hp }}" class="form-control" placeholder="Merk HP">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tipe HP</strong>
                    <input type="text" name="tipe_hp" value="{{ $datahp->tipe_hp }}" class="form-control" placeholder="Tipe HP">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tahun Produksi</strong>
                    <input type="text" name="thn_produksi" value="{{ $datahp->thn_produksi }}" class="form-control" placeholder="Tahun Produksi">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection