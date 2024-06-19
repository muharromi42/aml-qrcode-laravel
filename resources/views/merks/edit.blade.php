@extends('templates.layout')


@section('content')
    <!-- Basic Horizontal form layout section start -->
    <div id="main">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit merk barang</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('merk.index') }}"> Kembali</a>
                </div>
            </div>
        </div>

        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">merk Barang</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ route('merk.update', $merk->id) }}""
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="first-name-horizontal">Kategori : </label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="merk" value="{{ $merk->merk }}"
                                                    class="form-control" name="merk" placeholder="merk">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="email-horizontal">Catatan : </label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="catatan" value="{{ $merk->catatan }}"
                                                    class="form-control" name="catatan" placeholder="catatan">
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- // Basic Horizontal form layout section end -->
    {{-- <div class="main">
        <div class="section">
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
    </div> --}}
@endsection
