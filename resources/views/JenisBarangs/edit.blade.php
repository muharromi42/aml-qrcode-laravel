@extends('templates.layout')


@section('content')
    <div class="main">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit kendaraan</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href=""> Back</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('jenisbarang.update', $jenis_barang->id) }}"" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>kategori:</strong>
                        <input type="text" name="kategori" class="form-control" value="{{ $jenis_barang->kategori }}"
                            placeholder="Merk">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>catatan:</strong>
                        <input type="text" name="catatan" class="form-control" value="{{ $jenis_barang->catatan }}""
                            placeholder="Type">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
