<x-admin>
    <div class="container-fluid">
        <h1>Edit Data Guru</h1>

        <form action="{{ url('admin/guru/' . $guru->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($errors->any())
                @foreach ($errors->all() as $message)
                    <div class="alert alert-danger">{{ $message }}</div>
                @endforeach
            @endif

            <div class="card p-4">
                <!-- Foto Profil dengan preview -->
                <div class="mb-4 text-center">
                    <input type="text" name="sekolah_id" value="{{auth('admin')->user()->sekolah_id}}" hidden>
                    <label for="foto_profil" class="form-label fw-bold">Foto Profil</label>
                    <div>
                        <img id="previewFoto"
                            src="{{ old('foto_profil', $guru->foto_profil ? url('public/app/foto-guru/' . $guru->foto_profil) : url('public/Template/assets/images/profile/pngegg.png')) }}"
                            alt="Preview Foto"
                            style="max-width: 150px; max-height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 10px;" />
                    </div>
                    <input type="file" name="foto_profil" id="foto_profil" class="form-control mx-auto"
                        style="max-width: 300px;" accept="image/*" onchange="previewImage(event)">
                </div>

                <div class="row">
                    <!-- Kolom kiri -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nama Guru</label>
                            <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $guru->username) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="number" name="nip" id="nip" class="form-control" value="{{ old('nip', $guru->nip) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password <small>(Kosongkan jika tidak ingin ganti)</small></label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Isi jika ingin ganti password">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                                <option value="" disabled {{ old('jenis_kelamin', $guru->jenis_kelamin) ? '' : 'selected' }}>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki" {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <select name="agama" id="agama" class="form-select" required>
                                <option value="" disabled {{ old('agama', $guru->agama) ? '' : 'selected' }}>Pilih Agama</option>
                                <option value="Islam" {{ old('agama', $guru->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('agama', $guru->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katolik" {{ old('agama', $guru->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                <option value="Buddha" {{ old('agama', $guru->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Hindu" {{ old('agama', $guru->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Konghuchu" {{ old('agama', $guru->agama) == 'Konghuchu' ? 'selected' : '' }}>Konghuchu</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $guru->tempat_lahir) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $guru->tanggal_lahir) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status Aktif</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="" disabled {{ old('status', $guru->status) ? '' : 'selected' }}>Pilih Status Guru</option>
                                <option value="Aktif" {{ old('status', $guru->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Tidak Aktif" {{ old('status', $guru->status) == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>

                    <!-- Kolom kanan -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat', $guru->alamat) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="no_telepon" class="form-label">Nomor Telepon</label>
                            <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="{{ old('no_telepon', $guru->no_telepon) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $guru->email) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-select" required>
                                <option value="" disabled {{ old('jabatan', $guru->jabatan) ? '' : 'selected' }}>Pilih Jabatan</option>
                                <option value="Kepala Sekolah" {{old('jabatan', $guru->jabatan) == 'Kepala Sekolah' ? 'selected' : ''}}>Kepala Sekolah</option>
                                <option value="Waka Kesiswaan" {{ old('jabatan', $guru->jabatan) == 'Waka Kesiswaan' ? 'selected' : '' }}>Waka Kesiswaan</option>
                                <option value="Waka Kurikulum" {{ old('jabatan', $guru->jabatan) == 'Waka Kurikulum' ? 'selected' : '' }}>Waka Kurikulum</option>
                                <option value="Guru" {{old('jabatan', $guru->jabatan) == 'Guru' ? 'selected' : ''}}>Guru</option>
                                <option value="Tata Usaha" {{ old('jabatan', $guru->jabatan) == 'Tata Usaha' ? 'selected' : '' }}>Tata Usaha</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                            <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-select" required>
                                <option value="" disabled {{ old('pendidikan_terakhir', $guru->pendidikan_terakhir) ? '' : 'selected' }}>Pilih Pendidikan Terakhir</option>
                                <option value="Diploma" {{ old('pendidikan_terakhir', $guru->pendidikan_terakhir) == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                <option value="Sarjana" {{ old('pendidikan_terakhir', $guru->pendidikan_terakhir) == 'Sarjana' ? 'selected' : '' }}>Sarjana</option>
                                <option value="Megister" {{ old('pendidikan_terakhir', $guru->pendidikan_terakhir) == 'Megister' ? 'selected' : '' }}>Megister</option>
                                <option value="Doktor" {{ old('pendidikan_terakhir', $guru->pendidikan_terakhir) == 'Doktor' ? 'selected' : '' }}>Doktor</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                            <input type="number" name="tahun_masuk" id="tahun_masuk" class="form-control" value="{{ old('tahun_masuk', $guru->tahun_masuk) }}" required>
                        </div>
                    </div>
                </div> <!-- end row -->

                <div class="d-flex gap-2 mt-3 justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="ti ti-check"></i> Update
                    </button>
                    <a href="{{ url('admin/guru') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left"></i> Kembali
                    </a>
                </div>
            </div> <!-- end card -->
        </form>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('previewFoto');
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-admin>
