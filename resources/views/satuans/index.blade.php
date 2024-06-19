@extends('templates.layout')
@section('content')
    <!-- Basic Tables start -->
    <div id="main">
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
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Satuan Barang
                    </h3>
                </div>
                <div class="card-body">
                    <button class="btn rounded-pill btn-success m-2" data-bs-toggle="modal"
                        data-bs-target="#tambahsatuanbarang">
                        Tambah Satuan Barang
                    </button>
                    <div class="table-responsive">
                        <table class="table" id="table-1" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Satuan Barang</th>
                                    <th>Catatan</th>
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
    @include('satuans.create')
    {{-- @include('jenisbarangs.edit') --}}

    @push('scripts')
        <script type="text/javascript">
            $(function() {
                var table = $('#table-1').DataTable({
                    processing: true,
                    serverSide: true,
                    scrollX: true,
                    ajax: "{{ route('satuan.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            searchable: false
                        },
                        {
                            data: 'satuan',
                            name: 'satuan'
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

            @if (session('success'))
                Swal.fire({
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @endif
        </script>
    @endpush
@endsection
