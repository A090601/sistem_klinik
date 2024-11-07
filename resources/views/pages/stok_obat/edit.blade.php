@if (isset($stokObat))
    <div class="modal fade" id="modal-edit{{ $stokObat->id }}">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-center">
                    <h4 class="modal-title text-white">Update Stok Obat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('stok.update', $stokObat->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="supplier_id">Supplier</label>
                                        <select class="form-control @error('supplier_id') is-invalid @enderror"
                                            id="supplier_id" name="supplier_id" required>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}"
                                                    {{ $supplier->id == old('supplier_id', $stokObat->supplier_id) ? 'selected' : '' }}>
                                                    {{ $supplier->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('supplier_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_obat">Nama Obat</label>
                                        <input type="text"
                                            class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat"
                                            name="nama_obat" placeholder="Nama Obat"
                                            value="{{ old('nama_obat') ?? $stokObat->nama_obat }}" required />
                                        @error('nama_obat')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_obat">Jenis Obat</label>
                                        <input type="text"
                                            class="form-control @error('jenis_obat') is-invalid @enderror"
                                            id="jenis_obat" name="jenis_obat" placeholder="Jenis Obat"
                                            value="{{ old('jenis_obat') ?? $stokObat->jenis_obat }}" required />
                                        @error('jenis_obat')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_beli{{ $stokObat->id }}">Harga Beli</label>
                                        <input type="number"
                                            class="form-control @error('harga_beli') is-invalid @enderror"
                                            id="harga_beli{{ $stokObat->id }}" name="harga_beli"
                                            placeholder="Harga Beli"
                                            value="{{ old('harga_beli') ?? $stokObat->harga_beli }}" required
                                            oninput="calculateTotalEdit({{ $stokObat->id }})" />
                                        @error('harga_beli')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jumlah{{ $stokObat->id }}">Jumlah</label>
                                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                            id="jumlah{{ $stokObat->id }}" name="jumlah" placeholder="Jumlah"
                                            value="{{ old('jumlah') ?? $stokObat->jumlah }}" required
                                            oninput="calculateTotalEdit({{ $stokObat->id }})" />
                                        @error('jumlah')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="satuan">Satuan</label>
                                        <input type="text" class="form-control @error('satuan') is-invalid @enderror"
                                            id="satuan" name="satuan" placeholder="Satuan"
                                            value="{{ old('satuan') ?? $stokObat->satuan }}" required />
                                        @error('satuan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="total{{ $stokObat->id }}">Total</label>
                                        <input type="number" class="form-control @error('total') is-invalid @enderror"
                                            id="total{{ $stokObat->id }}" name="total" placeholder="Total"
                                            value="{{ old('total') ?? $stokObat->total }}" required readonly />
                                        @error('total')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endif

<script>
    function calculateTotalEdit(id) {
        var jumlah = document.getElementById('jumlah' + id).value;
        var hargaBeli = document.getElementById('harga_beli' + id).value;
        var total = document.getElementById('total' + id);

        var totalValue = jumlah * hargaBeli;
        total.value = totalValue;
    }
</script>
