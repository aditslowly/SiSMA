<x-admin>
    <div class="container-fluid">
        <h1 class="mb-4">Detail Data Guru</h1>
        <div class="card">
            <div class="card-body">
                <!-- Foto Profil di Atas -->
                <div class="text-center mb-4">
                    @if($guru->foto_profil)
                        <img src="{{ url('public/app/foto-guru/' . $guru->foto_profil) }}" alt="Foto Profil" class="img-fluid rounded" style="max-height: 300px;">
                    @else
                        <div class="bg-light text-center py-5 text-muted rounded">
                            <i class="ti ti-user" style="font-size: 48px;"></i><br>
                            Belum ada foto
                        </div>
                    @endif
                </div>

                <!-- Isi Detail Guru -->
                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" value="{{ $guru->username }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIP</label>
                            <input type="text" class="form-control" value="{{ $guru->nip }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" value="{{ $guru->jenis_kelamin }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Agama</label>
                            <input type="text" class="form-control" value="{{ $guru->agama }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" value="{{ $guru->tempat_lahir }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control"
                                value="{{ \Carbon\Carbon::parse($guru->tanggal_lahir)->translatedFormat('d F Y') }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control" value="{{ $guru->status }}" readonly>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" rows="3" readonly>{{ $guru->alamat }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" value="{{ $guru->no_telepon }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ $guru->email }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mata Pelajaran</label>
                            <input type="text" class="form-control" value="{{ $guru->mata_pelajaran }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jabatan</label>
                            <input type="text" class="form-control" value="{{ $guru->jabatan }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pendidikan Terakhir</label>
                            <input type="text" class="form-control" value="{{ $guru->pendidikan_terakhir }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Masuk</label>
                            <input type="text" class="form-control" value="{{ $guru->tahun_masuk }}" readonly>
                        </div>
                    </div>
                </div>

                <!-- Tombol Kembali -->
                <div class="mt-4 text-end">
                    <a href="{{ url('admin/guru') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin>

