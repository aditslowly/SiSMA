<!-- filepath: /Applications/XAMPP/xamppfiles/htdocs/siakad/system/resources/views/master-admin/data-sekolah/create.blade.php -->
<x-master-admin>
    <div class="container-fluid mt-4">
        <h4 class="mb-4">Tambah Data Sekolah</h4>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ url('master-admin/data-sekolah') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <!-- Kolom Kiri: Informasi Sekolah -->
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header">Informasi Sekolah</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                                <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control"
                                    placeholder="Masukkan Nama Sekolah" required>
                            </div>
                            <div class="mb-3">
                                <label for="npsn" class="form-label">NPSN</label>
                                <input type="text" name="npsn" id="npsn" class="form-control"
                                    placeholder="Masukkan NPSN" required>
                            </div>
                            <div class="mb-3">
                                <label for="akreditasi" class="form-label">Akreditasi</label>
                                <select name="akreditasi" id="akreditasi" class="form-select" required>
                                    <option value="" disabled selected>Pilih Akreditasi</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="Tidak Terakreditasi">Belum Terakreditasi</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kurikulum" class="form-label">Kurikulum</label>
                                <select name="kurikulum" id="kurikulum" class="form-select" required>
                                    <option value="" disabled selected>Pilih Kurikulum</option>
                                    <option value="Kurikulum K-13">Kurikulum K-13</option>
                                    <option value="Kurikulum Merdeka">Kurikulum Merdeka</option>
                                    <option value="Kurikulum KTSP">Kurikulum KTSP</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kepala_sekolah" class="form-label">Kepala Sekolah</label>
                                <input type="text" name="kepala_sekolah" id="kepala_sekolah" class="form-control"
                                    placeholder="Masukkan Kepala Sekolah" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                                <input type="text" name="alamat_lengkap" id="alamat_lengkap" class="form-control"
                                    placeholder="Masukkan Alamat" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Sekolah</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Masukkan Email sekolah" required>
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">Telepon Sekolah</label>
                                <input type="text" name="telepon" id="telepon" class="form-control"
                                    placeholder="Masukkan Telepon sekolah" required>
                            </div>
                            <div class="mb-3">
                                <label for="status_sekolah" class="form-label">Status</label>
                                <select name="status_sekolah" id="status_sekolah" class="form-select" required>
                                    <option value="" disabled selected>Pilih Status Sekolah</option>
                                    <option value="Negeri">Negeri</option>
                                    <option value="Swasta">Swasta</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kepemilikan_sekolah" class="form-label">Kepemilikan Sekolah</label>
                                <select name="kepemilikan_sekolah" id="kepemilikan_sekolah" class="form-select"
                                    required>
                                    <option value="" disabled selected>Pilih Status Kepemilikan</option>
                                    <option value="Pemerintah Daerah">Pemerintah Daerah</option>
                                    <option value="Yayasan">Yayasan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="status_aktif" class="form-label">Status Aktif</label>
                                <select name="status_aktif" id="status_aktif" class="form-select" required>
                                    <option value="" disabled selected>Pilih Status Aktif</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tahun_berdiri" class="form-label">Tahun Berdiri</label>
                                <input type="number" name="tahun_berdiri" id="tahun_berdiri" class="form-control"
                                    placeholder="Masukkan Tahun Berdiri" required>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_guru" class="form-label">Jumlah Guru</label>
                                <input type="number" name="jumlah_guru" id="jumlah_guru"
                                    class="form-control" placeholder="Masukkan Jumlah Guru" required>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_siswa" class="form-label">Jumlah Siswa</label>
                                <input type="number" name="jumlah_siswa" id="jumlah_siswa" class="form-control"
                                    placeholder="Masukkan Jumlah Siswa" required>
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
                                <label for="ruang_kelas" class="form-label">Ruang Kelas</label>
                                <input type="number" name="ruang_kelas" id="ruang_kelas" class="form-control"
                                    placeholder="Masukkan Jumlah" required>
                            </div>
                            <div class="mb-3">
                                <label for="ruang_perpustakaan" class="form-label">Ruang Perpustakaan</label>
                                <input type="number" name="ruang_perpustakaan" id="ruang_perpustakaan"
                                    class="form-control" placeholder="Masukkan Jumlah" required>
                            </div>
                            <div class="mb-3">
                                <label for="ruang_lab" class="form-label">Ruang Laboratorium</label>
                                <input type="number" name="ruang_lab" id="ruang_lab" class="form-control"
                                    placeholder="Masukkan Jumlah" required>
                            </div>
                            <div class="mb-3">
                                <label for="ruang_pimpinan" class="form-label">Ruang Pimpinan</label>
                                <input type="number" name="ruang_pimpinan" id="ruang_pimpinan" class="form-control"
                                    placeholder="Masukkan Jumlah" required>
                            </div>
                            <div class="mb-3">
                                <label for="ruang_guru" class="form-label">Ruang Guru</label>
                                <input type="number" name="ruang_guru" id="ruang_guru" class="form-control"
                                    placeholder="Masukkan Jumlah" required>
                            </div>
                            <div class="mb-3">
                                <label for="tempat_ibadah" class="form-label">Tempat Ibadah</label>
                                <input type="number" name="tempat_ibadah" id="tempat_ibadah" class="form-control"
                                    placeholder="Masukkan Jumlah" required>
                            </div>
                            <div class="mb-3">
                                <label for="ruang_uks" class="form-label">Ruang UKS</label>
                                <input type="number" name="ruang_uks" id="ruang_uks" class="form-control"
                                    placeholder="Masukkan Jumlah" required>
                            </div>
                            <div class="mb-3">
                                <label for="toilet" class="form-label">Ruang Toilet</label>
                                <input type="number" name="toilet" id="toilet" class="form-control"
                                    placeholder="Masukkan Jumlah" required>
                            </div>
                            <div class="mb-3">
                                <label for="ruang_tata_usaha" class="form-label">Ruang Tata Usaha</label>
                                <input type="number" name="ruang_tata_usaha" id="ruang_tata_usaha"
                                    class="form-control" placeholder="Masukkan Jumlah" required>
                            </div>
                            <div class="mb-3">
                                <label for="ruang_konseling" class="form-label">Ruang Konseling</label>
                                <input type="number" name="ruang_konseling" id="ruang_konseling"
                                    class="form-control" placeholder="Masukkan Jumlah" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Preview Logo dan Foto -->
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header">Preview Logo Sekolah</div>
                        <div class="card-body text-center">
                            <img id="logoPreview" src="#" alt="Preview Logo" class="img-fluid rounded"
                                style="display: none; max-width: 150px;">
                            <p id="logoPreviewText">Preview logo akan muncul di sini.</p>
                            <div class="mt-3">
                                <input type="file" class="form-control" id="logoInput" name="logo_sekolah"
                                    onchange="previewLogo(event)">
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">Preview Foto Sekolah</div>
                        <div class="card-body text-center">
                            <img id="fotoPreview" src="#" alt="Preview Foto" class="img-fluid rounded"
                                style="display: none; max-width: 250px;">
                            <p id="fotoPreviewText">Preview foto akan muncul di sini.</p>
                            <div class="mt-3">
                                <input type="file" class="form-control" id="fotoInput" name="foto_sekolah"
                                    onchange="previewFoto(event)">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <a class="btn btn-outline-secondary ms-2" href="{{ url('master-admin/data-sekolah') }}">
                    <i class="ti ti-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="ti ti-check"></i> Simpan Data Sekolah
                </button>
            </div>
        </form>
    </div>

    <script>
    // Preview Logo
    function previewLogo(event) {
        const input = event.target;
        const preview = document.getElementById('logoPreview');
        const previewText = document.getElementById('logoPreviewText');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                previewText.style.display = 'none';
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
            previewText.style.display = 'block';
        }
    }

    // Preview Foto
    function previewFoto(event) {
        const input = event.target;
        const preview = document.getElementById('fotoPreview');
        const previewText = document.getElementById('fotoPreviewText');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                previewText.style.display = 'none';
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
            previewText.style.display = 'block';
        }
    }
    </script>

    </script>
</x-master-admin>
