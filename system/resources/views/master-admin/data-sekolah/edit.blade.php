<!-- filepath: /Applications/XAMPP/xamppfiles/htdocs/siakad/system/resources/views/master-admin/data-sekolah/edit.blade.php -->
<x-master-admin>
    <div class="container-fluid mt-4">
        <h4 class="mb-4">Edit Data Sekolah</h4>
        <form action="{{ url('master-admin/data-sekolah/' . $sekolah->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

                <!-- Kolom Kiri: Informasi Sekolah -->
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header">Informasi Sekolah</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Sekolah</label>
                                <input type="text" name="nama_sekolah" class="form-control"
                                    value="{{ $sekolah->nama_sekolah }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">NPSN</label>
                                <input type="text" name="npsn" class="form-control" value="{{ $sekolah->npsn }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="akreditasi" class="form-label">Akreditasi</label>
                                <select name="akreditasi" id="akreditasi" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Akreditasi --</option>
                                    <option value="A" {{old('akreditasi', $sekolah->akreditasi) == 'A' ? 'selected' : ''}}>A</option>
                                    <option value="B" {{old('akreditasi', $sekolah->akreditasi) == 'B' ? 'selected' : ''}}>B</option>
                                    <option value="C" {{old('akreditasi', $sekolah->akreditasi) == 'c' ? 'selected' : ''}}>C</option>
                                    <option value="Tidak Terakreditasi" {{old('akreditasi', $sekolah->akreditasi) == 'Tidak Terakreditasi' ? 'selected' : ''}}>Tidak Terakreditasi</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kurikulum" class="form-label">Kurikulum</label>
                                <select name="kurikulum" id="kurikulum" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Kurikulum --</option>
                                    <option value="Kurikulum K-13" {{old('kurikulum', $sekolah->kurikulum) == 'Kurikulum K-13' ? 'selected' : ''}}>Kurikulum K-13</option>
                                    <option value="Kurikulum Merdeka" {{old('kurikulum', $sekolah->kurikulum) == 'Kurikulum Merdeka' ? 'selected' : ''}}>Kurikulum Merdeka</option>
                                    <option value="Kurikulum KTSP" {{old('kurikulum', $sekolah->kurikulum) == 'Kurikulum KTSP' ? 'selected' : ''}}>Kurikulum KTSP</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kepala Sekolah</label>
                                <input type="text" name="kepala_sekolah" class="form-control"
                                    value="{{ $sekolah->kepala_sekolah }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat Lengkap</label>
                                <input type="text" name="alamat_lengkap" class="form-control"
                                    value="{{ $sekolah->alamat_lengkap }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $sekolah->email }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telepon</label>
                                <input type="text" name="telepon" class="form-control"
                                    value="{{ $sekolah->telepon }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="status_sekolah" class="form-label">Status Sekolah</label>
                                <select name="status_sekolah" id="status_sekolah" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Status Sekolah --</option>
                                    <option value="Negeri" {{old('status_sekolah', $sekolah->status_sekolah) == 'Negeri' ? 'selected' : ''}}>Negeri</option>
                                    <option value="Swasta" {{old('status_sekolah', $sekolah->status_sekolah) == 'Swasta' ? 'selected' : ''}}>Swasta</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kepemilikan_sekolah" class="form-label">Kepemilikan Sekolah</label>
                                <select name="kepemilikan_sekolah" id="kepemilikan_sekolah" class="form-control"
                                    required>
                                    <option value="" disabled selected>-- Pilih Kepemilikan Sekolah --</option>
                                    <option value="Pemerintah Daerah" {{old('kepemilikan_sekolah', $sekolah->kepemilikan_sekolah) == 'Pemerintah Daerah' ? 'selected' : ''}}>Pemerintah Daerah</option>
                                    <option value="Yayasan" {{old('kepemilikan_sekolah', $sekolah->kepemilikan_sekolah) == 'Yayasan' ? 'selected' : ''}}>Yayasan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="status_aktif" class="form-label">Status Aktif</label>
                                <select name="status_aktif" id="status_aktif" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Status Aktif --</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun Berdiri</label>
                                <input type="text" name="tahun_berdiri" class="form-control"
                                    value="{{ $sekolah->tahun_berdiri }}" required>
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
                                <input type="text" name="jumlah_guru" class="form-control"
                                    value="{{ $sekolah->jumlah_guru }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jumlah Siswa</label>
                                <input type="text" name="jumlah_siswa" class="form-control"
                                    value="{{ $sekolah->jumlah_siswa }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ruang Kelas</label>
                                <input type="text" name="ruang_kelas" class="form-control"
                                    value="{{ $sekolah->ruang_kelas }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ruang Perpustakaan</label>
                                <input type="text" name="ruang_perpustakaan" class="form-control"
                                    value="{{ $sekolah->ruang_perpustakaan }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ruang Laboratorium</label>
                                <input type="text" name="ruang_lab" class="form-control"
                                    value="{{ $sekolah->ruang_lab }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ruang Pimpinan</label>
                                <input type="text" name="ruang_pimpinan" class="form-control"
                                    value="{{ $sekolah->ruang_pimpinan }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ruang Guru</label>
                                <input type="text" name="ruang_guru" class="form-control"
                                    value="{{ $sekolah->ruang_guru }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tempat Ibadah</label>
                                <input type="text" name="tempat_ibadah" class="form-control"
                                    value="{{ $sekolah->tempat_ibadah }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ruang UKS</label>
                                <input type="text" name="ruang_uks" class="form-control"
                                    value="{{ $sekolah->ruang_uks }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Toilet</label>
                                <input type="text" name="toilet" class="form-control"
                                    value="{{ $sekolah->toilet }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ruang Tata Usaha</label>
                                <input type="text" name="ruang_tata_usaha" class="form-control"
                                    value="{{ $sekolah->ruang_tata_usaha }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ruang Konseling</label>
                                <input type="text" name="ruang_konseling" class="form-control"
                                    value="{{ $sekolah->ruang_konseling }}" required>
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
                                <img id="previewFoto" src="{{ url('public/app/data-sekolah/' . $sekolah->foto_sekolah) }}"
                                    alt="Foto Sekolah" class="img-fluid rounded" style="max-width:250px;">
                            @else
                                <img id="previewFoto" src="{{ url('public/app/default.png') }}" alt="Foto Sekolah"
                                    class="img-fluid rounded" style="max-width:250px;">
                            @endif
                            <div class="mt-3">
                                <input type="file" name="foto_sekolah" class="form-control"
                                    onchange="previewFotoSekolah(event)">
                            </div>
                        </div>
                    </div>
                    <!-- Card: Logo Sekolah -->
                    <div class="card mb-3">
                        <div class="card-header">Logo Sekolah</div>
                        <div class="card-body text-center">
                            @if ($sekolah->logo_sekolah)
                                <img id="previewLogo" src="{{ url('public/app/data-sekolah/' . $sekolah->logo_sekolah) }}"
                                    alt="Logo Sekolah" class="img-fluid rounded" style="max-width:150px;">
                            @else
                                <img id="previewLogo" src="{{ url('public/app/logo-default.png') }}"
                                    alt="Logo Sekolah" class="img-fluid rounded" style="max-width:150px;">
                            @endif
                            <div class="mt-3">
                                <input type="file" name="logo_sekolah" class="form-control"
                                    onchange="previewLogoSekolah(event)">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Tombol Submit & Kembali -->
            <div class="d-flex gap-2 mt-3">
                <button type="button" class="btn btn-secondary" onclick="window.history.back();">
                    <i class="ti ti-arrow-left"></i> Kembali
                </button>
                <button type="submit" class="btn btn-success">
                    <i class="ti ti-check"></i> Update Data Sekolah
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewFotoSekolah(event) {
            const preview = document.getElementById('previewFoto');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    preview.src = reader.result;
                }
                reader.readAsDataURL(file);
            }
        }

        function previewLogoSekolah(event) {
            const preview = document.getElementById('previewLogo');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    preview.src = reader.result;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-master-admin>
