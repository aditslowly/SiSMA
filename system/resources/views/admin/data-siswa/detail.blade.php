<x-admin>
    <div class="container-fluid">
        <h4 class="mb-4">Detail Data Siswa</h4>

        <div class="card mb-3">
            <div class="row g-0">
                <!-- Kolom 1 -->
                <div class="col-md-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">NISN</label>
                            <input type="text" class="form-control" value="{{ $siswa->nisn }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIS</label>
                            <input type="text" class="form-control" value="{{ $siswa->nis }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" value="{{ $siswa->nama_siswa }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Pendaftaran</label>
                            <input type="text" class="form-control" value="{{ $siswa->jenis_pendaftaran }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jalur Pendaftaran</label>
                            <input type="text" class="form-control" value="{{ $siswa->jalur_pendaftaran }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Masuk</label>
                            <input type="text" class="form-control" value="{{ $siswa->tanggal_masuk }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control" value="{{ $siswa->status }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kebutuhan Khusus</label>
                            <input type="text" class="form-control" value="{{ $siswa->kebutuhan_khusus }}" readonly>
                        </div>
                    </div>
                </div>

                <!-- Kolom 2 -->
                <div class="col-md-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" value="{{ $siswa->email }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No KK</label>
                            <input type="text" class="form-control" value="{{ $siswa->no_kk }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" class="form-control" value="{{ $siswa->nik }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" value="{{ $siswa->jenis_kelamin }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Agama</label>
                            <input type="text" class="form-control" value="{{ $siswa->agama }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" value="{{ $siswa->tempat_lahir }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" value="{{ $siswa->tanggal_lahir }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" value="{{ $siswa->alamat }}" readonly>
                        </div>
                    </div>
                </div>

                <!-- Kolom 3 -->
                <div class="col-md-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">RT</label>
                            <input type="text" class="form-control" value="{{ $siswa->rt }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">RW</label>
                            <input type="text" class="form-control" value="{{ $siswa->rw }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dusun</label>
                            <input type="text" class="form-control" value="{{ $siswa->dusun }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Desa/Kelurahan</label>
                            <input type="text" class="form-control" value="{{ $siswa->desa_kelurahan }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Provinsi</label>
                            <input type="text" class="form-control" value="{{ $siswa->provinsi }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kabupaten</label>
                            <input type="text" class="form-control" value="{{ $siswa->kabupaten }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kecamatan</label>
                            <input type="text" class="form-control" value="{{ $siswa->kecamatan }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telepon</label>
                            <input type="text" class="form-control" value="{{ $siswa->telepon }}" readonly>
                        </div>
                    </div>
                </div>

                <!-- Kolom foto -->
                <div class="col-md-12 text-center mb-4">
                    @if ($siswa->foto)
                        <img src="{{ url('public/app/data-siswa/' . $siswa->foto) }}" alt="Foto Profil"
                            class="img-fluid rounded" style="max-height: 300px;">
                    @else
                        <div class="bg-light text-center py-4 text-muted">
                            <i class="ti ti-user" style="font-size: 48px;"></i><br>
                            Belum ada foto
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Tombol kembali -->
        <a href="{{ url('admin/siswa') }}" class="btn btn-secondary">
            <i class="ti ti-arrow-left"></i> Kembali
        </a>
    </div>
</x-admin>
