<!-- resources/views/pages/pendaftaran/create.blade.php -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="modal fade" id="modal-create-obat" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateLabel">Input Resep Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('obat.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control @error('pendaftaran_id') is-invalid @enderror"
                               id="pendaftaran_id" name="pendaftaran_id" value="{{ old('pendaftaran_id') ?? $pendaftaran->id }}" required readonly hidden/>
                        @error('pendaftaran_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_obat_id">Nama Obat:</label>
                        <select name="nama_obat_id" id="nama_obat_id" class="form-control" required >
                            @foreach ($stokObats as $stokObat)
                                <option value="{{ $stokObat->id }}">{{ $stokObat->nama_obat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dosis_obat">Dosis Obat:</label>
                        <input type="text" name="dosis_obat" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_obat">Jumlah Obat:</label>
                        <input type="text" name="jumlah_obat" class="form-control" required >
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


