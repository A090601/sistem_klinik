@if(isset($pegawai))
<div class="modal fade" id="modal-show{{ $pegawai->id }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-center">
                <h4 class="modal-title text-white">Biodata Pegawai</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        @if ($pegawai->image)
                            <img src="{{ Storage::url($pegawai->image) }}" alt="gambar" width="220px"
                                style="width: 220px; height: 220px; object-fit: cover; border-radius: 50%;" class="img-fluid">
                        @else
                            <img alt="image" class="img-fluid thumbnail"
                                src="{{ asset('assets/img/user_default.png') }}" width="120px"
                                style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;">
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="nip"><strong>NIP:</strong></label>
                                        <p id="nip">{{ $pegawai->nip }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="nama"><strong>Nama:</strong></label>
                                        <p id="nama">{{ $pegawai->nama }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="email"><strong>Email:</strong></label>
                                        <p id="email">{{ $pegawai->email }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="no_hp"><strong>Nomor Handphone:</strong></label>
                                        <p id="no_hp">{{ $pegawai->no_hp }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="jenis_kelamin"><strong>Jenis Kelamin:</strong></label>
                                        <p id="jenis_kelamin">{{ $pegawai->jenis_kelamin }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="npwp"><strong>NPWP:</strong></label>
                                        <p id="npwp">{{ $pegawai->npwp }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="alamat"><strong>Alamat:</strong></label>
                                        <p id="alamat">{{ $pegawai->alamat }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="tempat_lahir"><strong>Tempat Lahir:</strong></label>
                                        <p id="tempat_lahir">{{ $pegawai->tempat_lahir }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="tanggal_lahir"><strong>Tanggal Lahir:</strong></label>
                                        <p id="tanggal_lahir">{{ $pegawai->tanggal_lahir }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="jabatan"><strong>Jabatan:</strong></label>
                                        <p id="jabatan">{{ $pegawai->jabatan }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="tanggal_masuk"><strong>Tanggal Masuk:</strong></label>
                                        <p id="tanggal_masuk">{{ $pegawai->tanggal_masuk }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="status"><strong>Status:</strong></label>
                                        <p>@if ($pegawai->status == 'active')
                                            <span class="badge bg-success text-white">{{$pegawai->status}}</span>
                                        @else
                                        <span class="badge bg-danger text-white">{{$pegawai->status}}</span>
                                        @endif</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.modal-body -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endif
