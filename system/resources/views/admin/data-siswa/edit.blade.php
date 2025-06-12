<x-admin>
    <div class="container-fluid">
        <h4 class="mb-4">Edit Data Siswa</h4>
        <!-- Tampilkan pesan error jika ada -->
        @if ($errors)
            @foreach($errors->all() as $key => $message)
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @endforeach
        @endif
        <form action="{{ url('admin/siswa/' . $siswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card mb-3">
                <div class="row g-0">
                    <!-- Form Input -->
                    <div class="col-md-4">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="number" name="nisn" id="nisn" class="form-control @error('nisn') is-invalid @enderror"
                                    placeholder="Masukkan NISN" value="{{old('nisn', $siswa->nisn)}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="number" name="nis" id="nis" class="form-control @error('nis') is-invalid @enderror"
                                    placeholder="Masukkan NIS" value="{{old('nis', $siswa->nis)}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                                <input type="text" name="nama_siswa" id="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror"
                                    placeholder="Masukkan Nama Siswa" value="{{old('nama_siswa', $siswa->nama_siswa)}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_pendaftaran" class="form-label">Jenis Pendaftaran</label>
                                <select name="jenis_pendaftaran" id="jenis_pendaftaran" class="form-control @error('jenis_pendaftaran') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Jenis Pendaftaran</option>
                                    <option value="Peserta Didik Baru" {{old('jenis_pendaftaran', $siswa->jenis_pendaftaran) == 'Peserta Didik Baru' ? 'selected' : ''}}>Peserta Didik Baru</option>
                                    <option value="Pindahan" {{old('jenis_pendaftaran', $siswa->jenis_pendaftaran) == 'Pindahan' ? 'selected' : ''}}>Pindahan</option>
                                </select>
                                @error('jenis_pendaftaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jalur_pendaftaran" class="form-label">Jalur Pendaftaran</label>
                                <select name="jalur_pendaftaran" id="jalur_pendaftaran" class="form-control @error('jalur_pendaftaran') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Jalur Pendaftaran</option>
                                    <option value="Zonasi" {{old('jalur_pendaftaran', $siswa->jalur_pendaftaran) == 'Zonasi' ? 'selected' : ''}}>Zonasi</option>
                                    <option value="Afirmasi" {{old('jalur_pendaftaran', $siswa->jalur_pendaftaran) == 'Afirmasi' ? 'selected' : ''}}>Afirmasi</option>
                                    <option value="Perpindahan Orang Tua" {{old('jalur_pendaftaran', $siswa->jalur_pendaftaran) == 'Perpindahan Orang Tua' ? 'selected' : ''}}>Perpindahan Orang Tua</option>
                                    <option value="Prestasi" {{old('jalur_pendaftaran', $siswa->jalur_pendaftaran) == 'Prestasi' ? 'selected' : ''}}>Prestasi</option>
                                    <option value="Mandiri" {{old('jalur_pendaftaran', $siswa->jalur_pendaftaran) == 'Mandiri' ? 'selected' : ''}}>Mandiri</option>
                                </select>
                                @error('jalur_pendaftaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror" value="{{old('tanggal_masuk', $siswa->tanggal_masuk)}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Status</option>
                                    <option value="Aktif" {{old('status', $siswa->status) == 'Aktif' ? 'selected' : ''}}>Aktif</option>
                                    <option value="Tidak Aktif" {{old('status', $siswa->status) == 'Tidak Aktif' ? 'selected' : ''}}>Tidak Aktif</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kebutuhan_khusus" class="form-label">Kebutuhan Khusus</label>
                                <select name="kebutuhan_khusus" id="kebutuhan_khusus" class="form-control @error('kebutuhan_khusus') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Kebutuhan Khusus</option>
                                    <option value="Iya" {{old('kebutuhan_khusus', $siswa->kebutuhan_khusus) == 'Iya' ? 'selected' : ''}}>Iya</option>
                                    <option value="Tidak" {{old('kebutuhan_khusus', $siswa->kebutuhan_khusus) == 'Tidak' ? 'selected' : ''}}>Tidak</option>
                                </select>
                                @error('kebutuhan_khusus')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Masukkan email" value="{{old('email', $siswa->email)}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_kk" class="form-label">Nomor Kartu Keluarga</label>
                                <input type="text" name="no_kk" id="no_kk" class="form-control @error('no_kk') is-invalid @enderror"
                                    placeholder="Masukkan Nomor Kartu Keluarga" value="{{old('no_kk', $siswa->no_kk)}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="number" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror"
                                    placeholder="Masukkan Nomor Induk Kependudukan" value="{{old('nik', $siswa->nik)}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki" {{old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-Laki' ? 'selected' : ''}}>Laki-laki</option>
                                    <option value="Perempuan"  {{old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <select name="agama" id="agama" class="form-control @error('agama') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Agama</option>
                                    <option value="Islam" {{old('agama', $siswa->agama) == 'Islam' ? 'selected' : ''}}>Islam</option>
                                    <option value="Katolik" {{old('agama', $siswa->agama) == 'Katolik' ? 'selected' : ''}}>Katolik</option>
                                    <option value="Kristen" {{old('agama', $siswa->agama) == 'Kristen' ? 'selected' : ''}}>Kristen</option>
                                    <option value="Hindu" {{old('agama', $siswa->agama) == 'Hindu' ? 'selected' : ''}}>Hindu</option>
                                    <option value="Buddha" {{old('agama', $siswa->agama) == 'Buddha' ? 'selected' : ''}}>Buddha</option>
                                    <option value="Khonghuchu" {{old('agama', $siswa->agama) == 'Konghuchu' ? 'selected' : ''}}>Khonghuchu</option>
                                </select>
                                @error('agama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                    placeholder="Masukkan Tempat Lahir" value="{{old('tempat_lahir', $siswa->tempat_lahir)}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{old('tanggal_lahir', $siswa->tanggal_lahir)}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                    placeholder="Masukkan Alamat" value="{{old('alamat', $siswa->alamat)}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="rt" class="form-label">Nomor RT</label>
                                <input type="number" name="rt" id="rt" class="form-control @error('rt') is-invalid @enderror"
                                    placeholder="Masukkan Nomor RT" value="{{old('rt', $siswa->rt)}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="rw" class="form-label">Nomor RW</label>
                                <input type="number" name="rw" id="rw" class="form-control @error('rw') is-invalid @enderror"
                                    placeholder="Masukkan Nomor RW" value="{{old('rw', $siswa->rw)}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="dusun" class="form-label">Dusun</label>
                                <input type="text" name="dusun" id="dusun" class="form-control @error('dusun') is-invalid @enderror"
                                    placeholder="Masukkan Dusun" value="{{old('dusun', $siswa->dusun)}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="desa_kelurahan" class="form-label">Desa/Kelurahan</label>
                                <input type="text" name="desa_kelurahan" id="desa_kelurahan" class="form-control @error('desa_kelurahan') is-invalid @enderror"
                                    placeholder="Masukkan Desa Kelurahan" value="{{old('desa_kelurahan', $siswa->desa_kelurahan)}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                <input type="text" name="provinsi" id="provinsi" class="form-control @error('provinsi') is-invalid @enderror"
                                    placeholder="Masukkan Provinsi" value="{{old('provinsi', $siswa->provinsi)}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="kabupaten" class="form-label">Kabupaten</label>
                                <input type="text" name="kabupaten" id="kabupaten" class="form-control @error('kabupaten') is-invalid @enderror"
                                    placeholder="Masukkan Kabupaten" value="{{old('kabupaten', $siswa->kabupaten)}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="Kecamatan" class="form-label">Kecamatan</label>
                                <input type="text" name="kecamatan" id="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror"
                                    placeholder="Masukkan Kecamatan" value="{{old('kecamatan', $siswa->kecamatan)}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">Nomor Telepon</label>
                                <input type="text" name="telepon" id="telepon" class="form-control @error('telepon') is-invalid @enderror"
                                    placeholder="Masukkan Nomor Telepon" value="{{old('telepon', $siswa->telepon)}}" required>
                            </div>
                        </div>
                    </div>
                    <!-- Preview Foto -->
                    <div class="col-md-8 d-flex">
                        <div class="card-body w-50 pe-2">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Masukkan password">
                            </div>
                        </div>
                        <div class="card-body w-50 ps-2">
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto Siswa</label>
                                <input type="file" name="foto" id="foto" class="form-control" required
                                    onchange="previewImage(event)">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <img id="preview" src="#" alt="Preview Foto Profil" class="img-fluid rounded"
                                style="display: none; max-width: 250px;">
                            <p id="previewText">Preview foto akan muncul disini.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ url('admin/siswa') }}" class="btn btn-warning">
                    <i class="ti ti-arrow-left"></i> Back
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="ti ti-check"></i> Simpan Data
                </button>
            </div>
        </form>
    </div>
    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const previewText = document.getElementById('previewText');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    preview.src = reader.result;
                    preview.style.display = 'block';
                    previewText.style.display = 'none';
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
                previewText.style.display = 'block';
            }
        }
    </script>
</x-admin>
