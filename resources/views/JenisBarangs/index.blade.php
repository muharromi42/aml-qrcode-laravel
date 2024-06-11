@extends('templates.layout')
@section('content')
    <!-- Basic Tables start -->
    <div id="main">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Jenis Barang
                    </h3>
                </div>
                <div class="card-body">
                    <button class="btn rounded-pill btn-success m-2" data-bs-toggle="modal"
                        data-bs-target="#tambahjenisbarang">
                        Tambah Jenis Barang
                    </button>
                    <div class="table-responsive">
                        <table class="table" id="table-1" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori Barang</th>
                                    <th>Catatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <script type="text/javascript">
                            $(function() {
                                var table = $('#table-1').DataTable({
                                    processing: true,
                                    serverSide: true,
                                    scrollX: true,
                                    ajax: "{{ route('jenisbarang.index') }}",
                                    columns: [{
                                            data: 'DT_RowIndex',
                                            name: 'DT_RowIndex',
                                            searchable: false
                                        },
                                        {
                                            data: 'kategori',
                                            name: 'kategori'
                                        },
                                        {
                                            data: 'catatan',
                                            name: 'catatan'
                                        },
                                        {
                                            data: 'action',
                                            name: 'action',
                                            orderable: false,
                                            searchable: false
                                        }
                                    ]
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->
    </div>
    @include('jenisbarangs.create')
@endsection
