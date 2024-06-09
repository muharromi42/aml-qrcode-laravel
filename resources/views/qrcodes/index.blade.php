@extends('templates.layout')
@section('content')
    <!-- Basic Tables start -->
    <div id="main">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        QrCode
                    </h3>
                </div>
                <div class="card-body">
                    <button class="btn rounded-pill btn-success m-2">
                        Tambah data qrcode
                    </button>
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Qr Code</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->
    </div>
@endsection
