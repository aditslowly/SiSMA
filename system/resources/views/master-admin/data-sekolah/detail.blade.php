<!-- filepath: /Applications/XAMPP/xamppfiles/htdocs/siakad/system/resources/views/master-admin/data-sekolah/show.blade.php -->
<x-master-admin>
    <div class="container-fluid mt-4">
        <h4 class="mb-4">Detail Data Sekolah</h4>
        <div class="row">
            <!-- Kolom Kiri: Informasi Sekolah -->
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header">Informasi Sekolah</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Sekolah</label>
                            <input type="text" class="form-control" value="{{ $sekolah->nama_sekolah }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NPSN</label>
                            <input type="text" class="form-control" value="{{ $sekolah->npsn }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="akreditasi" class="form-label">Akreditasi</label>
                            <select id="akreditasi" class="form-control" disabled>
                                <option value="A" {{ $sekolah->akreditasi == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ $sekolah->akreditasi == 'B' ? 'selected' : '' }}>B</option>
                                <option value="C" {{ $sekolah->akreditasi == 'C' ? 'selected' : '' }}>C</option>
                                <option value="Tidak Terakreditasi" {{ $sekolah->akreditasi == 'Tidak Terakreditasi' ? 'selected' : '' }}>Tidak Terakreditasi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kurikulum" class="form-label">Kurikulum</label>
                            <select id="kurikulum" class="form-control" disabled>
                                <option value="Kurikulum K-13" {{ $sekolah->kurikulum == 'Kurikulum K-13' ? 'selected' : '' }}>Kurikulum K-13</option>
                                <option value="Kurikulum Merdeka" {{ $sekolah->kurikulum == 'Kurikulum Merdeka' ? 'selected' : '' }}>Kurikulum Merdeka</option>
                                <option value="Kurikulum KTSP" {{ $sekolah->kurikulum == 'Kurikulum KTSP' ? 'selected' : '' }}>Kurikulum KTSP</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kepala Sekolah</label>
                            <input type="text" class="form-control" value="{{ $sekolah->kepala_sekolah }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat Lengkap</label>
                            <input type="text" class="form-control" value="{{ $sekolah->alamat_lengkap }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ $sekolah->email }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telepon</label>
                            <input type="text" class="form-control" value="{{ $sekolah->telepon }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status Sekolah</label>
                            <select id="status" class="form-control" disabled>
                                <option value="Negeri" {{ $sekolah->status == 'Negeri' ? 'selected' : '' }}>Negeri</option>
                                <option value="Swasta" {{ $sekolah->status == 'Swasta' ? 'selected' : '' }}>Swasta</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kepemilikan_sekolah" class="form-label">Kepemilikan Sekolah</label>
                            <select id="kepemilikan_sekolah" class="form-control" disabled>
                                <option value="Pemerintah" {{ $sekolah->kepemilikan_sekolah == 'Pemerintah' ? 'selected' : '' }}>Pemerintah</option>
                                <option value="Swasta" {{ $sekolah->kepemilikan_sekolah == 'Swasta' ? 'selected' : '' }}>Swasta</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status_aktif" class="form-label">Status Aktif</label>
                            <select id="status_aktif" class="form-control" disabled>
                                <option value="Aktif" {{ $sekolah->status_aktif == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Tidak Aktif" {{ $sekolah->status_aktif == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Berdiri</label>
                            <input type="text" class="form-control" value="{{ $sekolah->tahun_berdiri }}" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Tengah: Fasilitas Sekolah -->
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header">Fasilitas Sekolah</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Jumlah Guru</label>
                            <input type="text" class="form-control" value="{{ $sekolah->jumlah_guru }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah Siswa</label>
                            <input type="text" class="form-control" value="{{ $sekolah->jumlah_siswa }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ruang Kelas</label>
                            <input type="text" class="form-control" value="{{ $sekolah->ruang_kelas }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ruang Perpustakaan</label>
                            <input type="text" class="form-control" value="{{ $sekolah->ruang_perpustakaan }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ruang Laboratorium</label>
                            <input type="text" class="form-control" value="{{ $sekolah->ruang_lab }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ruang Pimpinan</label>
                            <input type="text" class="form-control" value="{{ $sekolah->ruang_pimpinan }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ruang Guru</label>
                            <input type="text" class="form-control" value="{{ $sekolah->ruang_guru }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tempat Ibadah</label>
                            <input type="text" class="form-control" value="{{ $sekolah->tempat_ibadah }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ruang UKS</label>
                            <input type="text" class="form-control" value="{{ $sekolah->ruang_uks }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Toilet</label>
                            <input type="text" class="form-control" value="{{ $sekolah->toilet }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ruang Tata Usaha</label>
                            <input type="text" class="form-control" value="{{ $sekolah->ruang_tata_usaha }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ruang Konseling</label>
                            <input type="text" class="form-control" value="{{ $sekolah->ruang_konseling }}" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Foto & Logo Sekolah -->
            <div class="col-md-4">
                <!-- Card: Foto Sekolah -->
                <div class="card mb-3">
                    <div class="card-header">Foto Sekolah</div>
                    <div class="card-body text-center">
                        @if ($sekolah->foto_sekolah)
                            <img src="{{ url('public/app/data-sekolah/' . $sekolah->foto_sekolah) }}" alt="Foto Sekolah" class="img-fluid rounded" style="max-width:250px;">
                        @else
                            <img src="{{ url('public/app/default.png') }}" alt="Foto Sekolah" class="img-fluid rounded" style="max-width:250px;">
                        @endif
                    </div>
                </div>
                <!-- Card: Logo Sekolah -->
                <div class="card mb-3">
                    <div class="card-header">Logo Sekolah</div>
                    <div class="card-body text-center">
                        @if ($sekolah->logo_sekolah)
                            <img src="{{ url('public/app/data-sekolah/' . $sekolah->logo_sekolah) }}" alt="Logo Sekolah" class="img-fluid rounded" style="max-width:150px;">
                        @else
                            <img src="{{ url('public/app/logo-default.png') }}" alt="Logo Sekolah" class="img-fluid rounded" style="max-width:150px;">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Tombol Kembali -->
        <div class="mt-3">
            <a href="{{ url('master-admin/data-sekolah') }}" class="btn btn-secondary">
                <i class="ti ti-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</x-master-admin>
