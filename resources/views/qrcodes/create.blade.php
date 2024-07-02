            <!-- Modal -->
            <div class="modal fade text-left" id="tambahqrcode" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Tambah Barang </h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="{{ route('qrcode.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="barang_id">Pilih Barang</label>
                                    <select name="id_barang" id="id_barang" class="form-control" required>
                                        @foreach ($barangs as $barang)
                                            <option value="{{ $barang->id_barang }}">{{ $barang->kode_barang }} -
                                                {{ $barang->nama_barang }}</option>
                                        @endforeach
                                    </select>
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
