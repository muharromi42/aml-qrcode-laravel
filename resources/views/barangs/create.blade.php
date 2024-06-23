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
                                <label for="id_jenisbarang">Jenis Barang</label>
                                <select name="id_jenisbarang" id="id_jenisbarang" class="form-control">
                                    <option value="">Pilih Jenis Barang</option>
                                    @foreach ($jenis_barangs as $jenis_barang)
                                        <option value="{{ $jenis_barang->id }}"
                                            {{ isset($barang) && $barang->id_jenisbarang == $jenis_barang->id ? 'selected' : '' }}>
                                            {{ $jenis_barang->kategori }}</option>
                                    @endforeach
                                </select>
                                <label for="id_merk">Merk</label>
                                <select name="id_merk" id="id_merk" class="form-control">
                                    <option value="">Pilih Merk</option>
                                    @foreach ($merks as $merk)
                                        <option value="{{ $merk->id }}"
                                            {{ isset($barang) && $barang->id_merk == $merk->id ? 'selected' : '' }}>
                                            {{ $merk->merk }}</option>
                                    @endforeach
                                </select>
                                <label for="id_satuan">Satuan</label>
                                <select name="id_satuan" id="id_satuan" class="form-control">
                                    <option value="">Pilih Satuan</option>
                                    @foreach ($satuans as $satuan)
                                        <option value="{{ $satuan->id }}"
                                            {{ isset($barang) && $barang->id_satuan == $satuan->id ? 'selected' : '' }}>
                                            {{ $satuan->satuan }}</option>
                                    @endforeach
                                </select>

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
