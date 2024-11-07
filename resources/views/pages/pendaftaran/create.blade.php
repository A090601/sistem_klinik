<!-- resources/views/pages/pendaftaran/create.blade.php -->

<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateLabel">Tambah Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('pendaftaran.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="no_rekmed">No Rekam Medis</label>
                        <input type="text" class="form-control @error('no_rekmed') is-invalid @enderror"
                            id="no_rekmed" name="no_rekmed" value="{{ old('no_rekmed') }}" required>
                        @error('no_rekmed')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" value="{{ old('nama') }}" required>
                        @error('nama')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status_pasien">Status Pasien</label>
                        <select class="form-control @error('status_pasien') is-invalid @enderror" id="status_pasien"
                            name="status_pasien" required>
                            <option selected disabled>Pilih Status Pasien</option>
                            <option value="KARTU BEROBAT">BPJS</option>
                            <option value="Umum">Umum</option>
                        </select>
                        @error('status_pasien')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="status_panggilan">Status Panggilan</label>
                        <input type="text" class="form-control @error('status_panggilan') is-invalid @enderror" id="status_panggilan" name="status_panggilan" value="{{ old('status_panggilan') }}" required>
                        @error('status_panggilan')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="dokter_id">Dokter</label>
                        <select class="form-control @error('dokter_id') is-invalid @enderror" id="dokter_id"
                            name="dokter_id" required>
                            <option selected>-- Pilih Dokter --</option>
                            @foreach ($dokters as $dokter)
                                <option value="{{ $dokter->id }}"
                                    {{ old('dokter_id') == $dokter->id ? 'selected' : '' }}>{{ $dokter->nama }}</option>
                            @endforeach
                        </select>
                        @error('dokter_id')
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
