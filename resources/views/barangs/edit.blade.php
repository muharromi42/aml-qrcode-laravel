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
                    <a class="btn btn-primary" href="{{ route('barang.index') }}"> Kembali</a>
                </div>
            </div>
        </div>

        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Barang</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal"
                                    action="{{ route('barang.update', $barang->id_barang) }}"" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="first-name-horizontal">Nama Barang : </label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="nama_barang" value="{{ $barang->nama_barang }}"
                                                    class="form-control" name="nama_barang" placeholder="barang">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="email-horizontal">Kode Barang : </label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="kode_barang" value="{{ $barang->kode_barang }}"
                                                    class="form-control" name="kode_barang" placeholder="kode barang"
                                                    readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="email-horizontal">Kategori : </label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select class="form-select" id="id_jenisbarang" name="id_jenisbarang">
                                                    @foreach ($jenis_barangs as $jenisbarang)
                                                        <option value="{{ $jenisbarang->id }}"
                                                            {{ $barang->id_jenisbarang == $jenisbarang->id ? 'selected' : '' }}>
                                                            {{ $jenisbarang->kategori }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="email-horizontal">Merk : </label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select class="form-select" id="id_merk" name="id_merk">
                                                    @foreach ($merks as $merk)
                                                        <option value="{{ $merk->id }}"
                                                            {{ $barang->id_merk == $merk->id ? 'selected' : '' }}>
                                                            {{ $merk->merk }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="email-horizontal">Satuan : </label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select class="form-select" id="id_satuan" name="id_satuan">
                                                    @foreach ($satuans as $satuan)
                                                        <option value="{{ $satuan->id }}"
                                                            {{ $barang->id_satuan == $satuan->id ? 'selected' : '' }}>
                                                            {{ $satuan->satuan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="email-horizontal">Jumlah Barang : </label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="jumlah" value="{{ $barang->jumlah }}"
                                                    class="form-control" name="jumlah" placeholder="jumlah barang">
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
