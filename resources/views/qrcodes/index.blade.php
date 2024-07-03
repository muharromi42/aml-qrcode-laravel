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
                    <button class="btn rounded-pill btn-success m-2" data-bs-toggle="modal" data-bs-target="#tambahqrcode">
                        Tambah data qrcode
                    </button>
                    <div class="table-responsive">
                        <table class="table" id="table-1" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Kode Barang</th>
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
        <!-- Modal Bootstrap untuk menampilkan gambar QR Code -->
        <div class="modal fade" id="modalGambar" tabindex="-1" aria-labelledby="modalGambarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalGambarLabel">Gambar QR Code</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="gambarModal" src="" alt="Gambar QR Code" style="width: 250px" height="auto">
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('qrcodes.create')


    @push('scripts')
        <script type="text/javascript">
            $(function() {
                // Event handler untuk memasukkan gambar QR Code ke dalam modal saat diklik
                $('#table-1').on('click', 'img[data-toggle="modal"]', function() {
                    var src = $(this).attr('src');
                    $('#gambarModal').attr('src', src);
                    $('#modalGambar').modal('show');
                });
                // datatable
                var table = $('#table-1').DataTable({
                    processing: true,
                    serverSide: true,
                    scrollX: true,
                    ajax: "{{ route('qrcode.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            searchable: false
                        },
                        {
                            data: 'id_barang',
                            name: 'id_barang'
                        },
                        {
                            data: 'kode_barang',
                            name: 'kode_barang'
                        },
                        {
                            data: 'qr_code_data',
                            name: 'qr_code_data',
                            render: function(data, type, full, meta) {
                                return '<img src="data:image/png;base64,' + data +
                                    '" alt="QR Code" style="width: 100px; height: auto;" ' +
                                    'data-toggle="modal" data-target="#modalGambar">';
                            },
                            orderable: false,
                            searchable: false
                        },
                        // ini fungsi pop up qr kecil
                        // {
                        //     data: 'qr_code_data',
                        //     name: 'qr_code_data',
                        //     render: function(data, type, full, meta) {
                        //         return '<img src="data:image/png;base64,' + data +
                        //             '" alt="QR Code" style="width: 100px; height: auto;" data-qrcode="' +
                        //             data + '">';
                        //     },
                        //     orderable: false,
                        //     searchable: false
                        // },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });


                // Menangani klik pada gambar QR Code untuk memperbesar
                // $('#table-1').on('click', 'img[data-qrcode]', function() {
                //     var qrcodeData = $(this).data('qrcode');
                //     // Tampilkan modal Bootstrap dengan gambar QR Code yang lebih besar
                //     Swal.fire({
                //         imageUrl: 'data:image/png;base64,' + qrcodeData,
                //         imageAlt: 'QR Code',
                //         showCloseButton: true,
                //         showConfirmButton: false
                //     });
                // });

                // menambahkan sweetalert2 untuk konfirmasi delete button
                $('#table-1').on('click', '.delete-button', function(event) {
                    event.preventDefault();
                    var form = $(this).closest('form');
                    Swal.fire({
                        title: 'Yakin?',
                        text: "Kamu tidak bisa mengulangnya lagi!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: "Batal",
                        confirmButtonText: 'Ya, hapus data ini!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
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
