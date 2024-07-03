            <!-- Modal -->
            <div class="modal fade text-left" id="tambahsatuanbarang" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Tambah satuan Barang </h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="{{ route('satuan.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label for="satuan">satuan: </label>
                                <div class="form-group">
                                    <input id="satuan" type="text" name="satuan" placeholder="satuan Barang"
                                        class="form-control">
                                </div>
                                <label for="catatan">Catatan: </label>
                                <div class="form-group">
                                    <input id="catatan" type="text" name="catatan" placeholder="Catatan"
                                        class="form-control" value="-">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-primary ms-1">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Tambah</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- end modal --}}
