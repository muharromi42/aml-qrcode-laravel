            <!-- Modal -->
            <div class="modal fade text-left" id="editjenisbarang" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Edit Jenis Barang </h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        {{-- <form id="editJenisBarangLabel" method="POST"> --}}
                        <form action="{{ route('jenisbarang.update', '$jenis_barang->id') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <label for="kategori">Kategori: </label>
                                <div class="form-group">
                                    <input id="kategori" type="text" name="kategori" placeholder="Kategori Barang"
                                        class="form-control">
                                </div>
                                <label for="catatan">Catatan: </label>
                                <div class="form-group">
                                    <input id="catatan" type="text" name="catatan" placeholder="Catatan"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-primary ms-1">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">edit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- end modal --}}
            {{-- <script>
                function openEditModal(id) {
                    // AJAX call to fetch the edit form content
                    $.ajax({
                        url: '/jenisbarang/' + id + '/edit',
                        method: 'GET',
                        success: function(response) {
                            // Populate the modal with the response
                            $('#editjenisbarang .modal-content').html(response);
                            // Open the modal
                            $('#editjenisbarang').modal('show');
                        }
                    });
                }
            </script> --}}
