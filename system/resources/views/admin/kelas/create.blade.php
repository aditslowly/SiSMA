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

                    <div class="mb-3">
                        <label for="pivot_guru_id" class="form-label">Pilih Guru & Tahun Ajar</label>
                        <select name="pivot_guru_id[]" id="pivot_guru_id" class="form-select select2-guru" multiple
                            required>
                            @foreach ($pivotGuru as $pivot)
                                <option value="{{ $pivot->id }}"
                                    {{ collect(old('pivot_guru_id'))->contains($pivot->id) ? 'selected' : '' }}>
                                    {{ $pivot->guru->username }} - {{ $pivot->tahun_ajar->tahun_ajar }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="mapel_id" class="form-label">Pilih Mata Pelajaran</label>
                        <select name="mapel_id[]" id="mapel_id" class="form-select select2-mapel" multiple required>
                            @foreach ($mapels as $mapel)
                                <option value="{{ $mapel->id }}"
                                    {{ collect(old('mapel_id'))->contains($mapel->id) ? 'selected' : '' }}>
                                    {{ $mapel->nama_mapel }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="siswa_id" class="form-label">Masukkan Siswa</label>
                        <select name="siswa_id[]" id="siswa_id" class="form-select select2-siswa" required multiple>
                            @foreach ($siswas as $siswa)
                                <option value="{{ $siswa->id }}"
                                    {{ collect(old('siswa_id'))->contains($siswa->id) ? 'selected' : '' }}>
                                    {{ $siswa->nama_siswa }} - {{ $siswa->nisn }}
                                </option>
                            @endforeach
                        </select>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Aktifkan Select2 -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('.select2-siswa').select2({
            placeholder: 'Pilih Siswa',
            allowClear: true,
        })
    })

    document.addEventListener('DOMContentLoaded', function() {
        $('.select2-guru').select2({
            placeholder: 'Pilih Kombinasi Guru & Tahun Ajar',
            allowClear: true,
        })
    })

    document.addEventListener('DOMContentLoaded', function() {
        $('.select2-mapel').select2({
            placeholder: 'Pilih Mata Pelajaran',
            allowClear: true,
        })
    })
</script>
