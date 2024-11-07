<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-center">
                <h4 class="modal-title text-white">Create Stok Obat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('stok.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="supplier_id">Supplier</label>
                                    <select class="form-control @error('supplier_id') is-invalid @enderror"
                                        id="supplier_id" name="supplier_id" required>
                                        <option disabled selected>-- Pilih Supplier --</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('supplier_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_obat">Nama Obat</label>
                                    <input type="text" class="form-control @error('nama_obat') is-invalid @enderror"
                                        id="nama_obat" name="nama_obat" placeholder="Nama Obat"
                                        value="{{ old('nama_obat') }}" required />
                                    @error('nama_obat')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jenis_obat">Jenis Obat</label>
                                    <input type="text" class="form-control @error('jenis_obat') is-invalid @enderror"
                                        id="jenis_obat" name="jenis_obat" placeholder="Jenis Obat"
                                        value="{{ old('jenis_obat') }}" required />
                                    @error('jenis_obat')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="harga_beli">Harga Beli</label>
                                    <input type="number" class="form-control @error('harga_beli') is-invalid @enderror"
                                        id="harga_beli" name="harga_beli" placeholder="Harga Beli"
                                        value="{{ old('harga_beli') }}" required oninput="calculateTotal()" />
                                    @error('harga_beli')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                        id="jumlah" name="jumlah" placeholder="Jumlah" value="{{ old('jumlah') }}"
                                        required oninput="calculateTotal()" />
                                    @error('jumlah')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="satuan">Satuan</label>
                                    <input type="text" class="form-control @error('satuan') is-invalid @enderror"
                                        id="satuan" name="satuan" placeholder="Satuan" value="{{ old('satuan') }}"
                                        required />
                                    @error('satuan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="total">Total</label>
                                    <input type="number" class="form-control @error('total') is-invalid @enderror"
                                        id="total" name="total" placeholder="Total" value="{{ old('total') }}"
                                        readonly />
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
    </div>
</div>

<script>
    function calculateTotal() {
        var jumlah = document.getElementById('jumlah').value;
        var hargaBeli = document.getElementById('harga_beli').value;
        var total = document.getElementById('total');

        var totalValue = jumlah * hargaBeli;
        total.value = totalValue;
    }
</script>
