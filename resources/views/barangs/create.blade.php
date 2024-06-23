            <!-- Modal -->
            <div class="modal fade text-left" id="tambahbarang" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Tambah Merk Barang </h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="{{ route('barang.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label for="nama_barang">Nama Barang: </label>
                                <div class="form-group">
                                    <input id="nama_barang" type="text" name="nama_barang" placeholder="Nama Barang"
                                        class="form-control">
                                </div>
                                <label for="kategori">Kategori: </label>
                                <div class="form-group">
                                    <input id="kategori" type="text" name="kategori" placeholder="kategori"
                                        class="form-control">
                                </div>
                                <label for="merk">Merk: </label>
                                <div class="form-group">
                                    <input id="merk" type="text" name="merk" placeholder="merk"
                                        class="form-control">
                                </div>
                                <label for="satuan">Satuan: </label>
                                <div class="form-group">
                                    <input id="satuan" type="text" name="satuan" placeholder="Satuan"
                                        class="form-control">
                                </div>
                                <label for="jumlah">Jumlah barang: </label>
                                <div class="form-group">
                                    <input id="jumlah" type="text" name="jumlah" placeholder="Jumlah barang"
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
                                    <span class="d-none d-sm-block">Tambah</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- end modal --}}
