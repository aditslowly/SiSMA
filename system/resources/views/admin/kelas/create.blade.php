<x-admin>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header text-white">
                <h4 class="mb-0">Tambah Kelas Baru</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/kelas') }}" method="POST">
                    @csrf

                    {{-- Alert Error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Success Alert --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Nama Kelas --}}
                    <input type="text" name="sekolah_id" value="{{ auth('admin')->user()->sekolah_id }}" hidden />
                    <div class="mb-3">
                        <label for="nama_kelas" class="form-label">Nama Kelas</label>
                        <input type="text" name="nama_kelas" id="nama_kelas"
                            class="form-control @error('nama_kelas') is-invalid @enderror" required>
                        @error('nama_kelas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tahun_ajar_id" class="form-label">Tahun Ajar</label>
                        <select name="tahun_ajar_id" class="form-select">
                            <option value="" disabled>-- Pilih Tahun Ajar --</option>
                            @foreach ($tahun_ajar as $tahun)
                                <option value="{{ $tahun->id }}">{{ $tahun->tahun_ajar }}</option>
                            @endforeach
                        </select>
                        @error('tahun_ajar_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="siswa_id" class="form-label">Nama Siswa</label>
                        <select name="siswa_id" class="form-select" required>
                            <option value="">-- Tambahkan Siswa --</option>
                            @foreach ($siswas as $siswa)
                                <option value="{{ $siswa->id }}">{{ $siswa->nama_siswa }}</option>
                            @endforeach
                        </select>
                        @error('siswa_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tingkat --}}
                    <div class="mb-3">
                        <label for="tingkat" class="form-label">Tingkat</label>
                        <select name="tingkat" id="tingkat" class="form-select @error('tingkat') is-invalid @enderror"
                            required>
                            <option value="" disabled>-- Pilih Tingkat --</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                        @error('tingkat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jurusan --}}
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select name="jurusan" id="jurusan" class="form-select @error('jurusan') is-invalid @enderror"
                            required>
                            <option value="" selected disabled>-- Pilih Jurusan --</option>
                            <option value="IPA">IPA</option>
                            <option value="IPS">IPS</option>
                        </select>
                        @error('jurusan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Wali Kelas --}}
                    <div class="mb-3">
                        <label for="wali_kelas_id" class="form-label">Wali Kelas</label>
                        <select name="wali_kelas_id" id="wali_kelas_id"
                            class="form-select @error('wali_kelas_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Wali Kelas --</option>
                            @foreach ($gurus as $guru)
                                <option value="{{ $guru->id }}">{{ $guru->username }}</option>
                            @endforeach
                        </select>
                        @error('wali_kelas_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="mt-4 d-flex justify-content-end gap-2">
                        <a href="{{ url('admin/kelas') }}" class="btn btn-primary">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="ti ti-check"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin>
