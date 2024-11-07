<!-- resources/views/pages/pendaftaran/create.blade.php -->

<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateLabel">Input Tindakan Medis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('tindakan.store') }}">
                    @csrf
                    {{-- <div class="form-group">
                        <label for="no_rekmed">No Rekam Medis</label>
                        <input type="text" class="form-control @error('no_rekmed') is-invalid @enderror" id="no_rekmed" name="no_rekmed" value="{{ old('no_rekmed') }}" required>
                        @error('no_rekmed')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                        @error('nama')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status_pasien">Status Pasien</label>
                        <select class="form-control @error('status_pasien') is-invalid @enderror" id="status_pasien" name="status_pasien" required>
                            <option selected disabled>Pilih Status Pasien</option>
                            <option value="BPJS">BPJS</option>
                            <option value="Umum">Umum</option>
                        </select>
                        @error('status_pasien')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}

                    <div class="form-group">

                        <input type="text" class="form-control @error('pendaftaran_id') is-invalid @enderror"
                               id="pendaftaran_id" name="pendaftaran_id" value="{{ old('pendaftaran_id') ?? $pendaftaran->id }}" required readonly hidden/>
                        @error('pendaftaran_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="spesialisasi">Poli</label>
                        <input type="text" class="form-control" id="spesialisasi" value="{{ $pendaftaran->dokter->spesialisasi }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_penyakit">Nama Penyakit</label>
                        <input type="text" class="form-control @error('nama_penyakit') is-invalid @enderror" id="nama_penyakit" name="nama_penyakit" value="{{ old('nama_penyakit') }}" required>
                        @error('nama_penyakit')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_tindakan">Nama Tindakan</label>
                        <input type="text" class="form-control @error('nama_tindakan') is-invalid @enderror" id="nama_tindakan" name="nama_tindakan" value="{{ old('nama_tindakan') }}" required>
                        @error('nama_tindakan')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hasil_periksa">Hasil Periksa</label>
                        <textarea class="form-control @error('hasil_periksa') is-invalid @enderror" id="hasil_periksa" name="hasil_periksa" required>{{ old('hasil_periksa') }}</textarea>
                        @error('hasil_periksa')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_obat">Nama Obat</label>
                        <textarea class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat" name="nama_obat" required>{{ old('nama_obat') }}</textarea>
                        @error('nama_obat')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="modal-footer justify-content-end">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
