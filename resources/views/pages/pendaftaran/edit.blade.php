<!-- resources/views/pages/pendaftaran/edit.blade.php -->

<div class="modal fade" id="modal-edit{{ $pendaftaran->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalEditLabel{{ $pendaftaran->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel{{ $pendaftaran->id }}">Edit Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('pendaftaran.update', $pendaftaran->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="no_rekmed{{ $pendaftaran->id }}">No Rekam Medis</label>
                        <input type="text" class="form-control @error('no_rekmed') is-invalid @enderror"
                            id="no_rekmed{{ $pendaftaran->id }}" name="no_rekmed"
                            value="{{ old('no_rekmed', $pendaftaran->no_rekmed) }}" required>
                        @error('no_rekmed')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama{{ $pendaftaran->id }}">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                            id="nama{{ $pendaftaran->id }}" name="nama"
                            value="{{ old('nama', $pendaftaran->nama) }}" required>
                        @error('nama')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status_pasien">Status Pasien</label>
                        <select class="form-control @error('status_pasien') is-invalid @enderror" id="status_pasien"
                            name="status_pasien" required>
                            <option value="KARTU BEROBAT"
                                {{ old('status_pasien', $pendaftaran->status_pasien) == 'BPJS' ? 'selected' : '' }}>BPJS
                            </option>
                            <option value="Umum"
                                {{ old('status_pasien', $pendaftaran->status_pasien) == 'Umum' ? 'selected' : '' }}>Umum
                            </option>
                        </select>
                        @error('status_pasien')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label for="status_panggilan{{ $pendaftaran->id }}">Status Panggilan</label>
                        <input type="text" class="form-control @error('status_panggilan') is-invalid @enderror" id="status_panggilan{{ $pendaftaran->id }}" name="status_panggilan" value="{{ old('status_panggilan', $pendaftaran->status_panggilan) }}" required>
                        @error('status_panggilan')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="status_panggilan{{ $pendaftaran->id }}">Status Panggilan</label>
                        <select class="form-control @error('status_panggilan') is-invalid @enderror"
                            id="status_panggilan{{ $pendaftaran->id }}" name="status_panggilan" required>d
                            <option value="belum"
                                {{ old('status_panggilan', $pendaftaran->status_panggilan) == 'belum' ? 'selected' : '' }}>
                                Belum</option>
                            <option value="sudah"
                                {{ old('status_panggilan', $pendaftaran->status_panggilan) == 'sudah' ? 'selected' : '' }}>
                                Sudah</option>
                        </select>
                        @error('status_panggilan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="dokter_id{{ $pendaftaran->id }}">Dokter</label>
                        <select class="form-control @error('dokter_id') is-invalid @enderror"
                            id="dokter_id{{ $pendaftaran->id }}" name="dokter_id" required>
                            @foreach ($dokters as $dokter)
                                <option value="{{ $dokter->id }}"
                                    {{ old('dokter_id', $pendaftaran->dokter_id) == $dokter->id ? 'selected' : '' }}>
                                    {{ $dokter->nama }}</option>
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
