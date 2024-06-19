@extends('templates.layout')
@section('content')
    <!-- Basic Tables start -->
    <div id="main">
        <section class="section">
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Merk Barang
                    </h3>
                </div>
                <div class="card-body">
                    <button class="btn rounded-pill btn-success m-2" data-bs-toggle="modal" data-bs-target="#tambahmerkbarang">
                        Tambah Merk Barang
                    </button>
                    <div class="table-responsive">
                        <table class="table" id="table-1" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Merk Barang</th>
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
    @include('merks.create')
    {{-- @include('jenisbarangs.edit') --}}

    @push('scripts')
        <script type="text/javascript">
            $(function() {
                var table = $('#table-1').DataTable({
                    processing: true,
                    serverSide: true,
                    scrollX: true,
                    ajax: "{{ route('merk.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            searchable: false
                        },
                        {
                            data: 'merk',
                            name: 'merk'
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

            // $('#table-1').on('click', '.edit-btn', function() {
            //     var id = $(this).data('id');
            //     $.get('jenisbarang/' + id + '/edit', function(data) {
            //         $('#editjenisbarang form').attr('action', 'jenisbarang/' + id);
            //         $('#editjenisbarang #kategori').val(data.kategori);
            //         $('#editjenisbarang #catatan').val(data.catatan);
            //         $('#editjenisbarang').modal('show');
            //     });
            // });


            // function openEditModal(id) {
            //     $.get("{{ url('jenisbarang') }}/" + id + "/edit", function(data) {
            //         $('#editId').val(data.id);
            //         $('#editName').val(data.name);
            //         $('#editDescription').val(data.description);
            //         $('#editForm').attr('action', "{{ url('jenisbarang') }}/" + id);
            //         $('#editjenisbarang').modal('show');
            //     })
            // }

            // $('#saveChanges').on('click', function() {
            //     var form = $('#editForm');
            //     var id = $('#editId').val();
            //     var url = "{{ url('jenisbarang') }}/" + id;

            //     $.ajax({
            //         url: url,
            //         type: 'PUT',
            //         data: form.serialize(),
            //         success: function(response) {
            //             $('#editjenisbarang').modal('hide');
            //             table.ajax.reload();
            //             Swal.fire({
            //                 title: 'Success!',
            //                 text: response.success,
            //                 icon: 'success',
            //                 confirmButtonText: 'OK'
            //             });
            //         },
            //         error: function(xhr) {
            //             var errors = xhr.responseJSON.errors;
            //             var errorMessage = '';

            //             $.each(errors, function(key, value) {
            //                 errorMessage += value + '<br>';
            //             });

            //             Swal.fire({
            //                 title: 'Error!',
            //                 html: errorMessage,
            //                 icon: 'error',
            //                 confirmButtonText: 'OK'
            //             });
            //         }
            //     });
            // });
        </script>
    @endpush
@endsection
