<x-admin>
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Kelas</h4>
            </div>
            <div class="card-body">
                <form id="updateForm" action="{{ url('admin/kelas/' . $kelas->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
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

                    <input type="text" name="sekolah_id" value="{{auth('admin')->user()->sekolah_id}}" hidden/>
                    <div class="mb-3">
                        <label for="nama_kelas" class="form-label">Nama Kelas</label>
                        <input type="text" name="nama_kelas" class="form-control"
                                value="{{ old('nama_kelas', $kelas->nama_kelas) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tingkat" class="form-label">Tingkat</label>
                        <select name="tingkat" class="form-select" required>
                            <option value="" disabled>-- Pilih Tingkat --</option>
                            @foreach (['X', 'XI', 'XII'] as $tingkat)
                                <option value="{{ $tingkat }}" {{ old('tingkat', $kelas->tingkat) == $tingkat ? 'selected' : '' }}>
                                    {{ $tingkat }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select name="jurusan" class="form-select" required>
                            <option value="" disabled>-- Pilih Jurusan --</option>
                            @foreach (['IPA', 'IPS'] as $jurusan)
                                <option value="{{ $jurusan }}" {{ old('jurusan', $kelas->jurusan) == $jurusan ? 'selected' : '' }}>
                                    {{ $jurusan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="wali_kelas_id" class="form-label">Wali Kelas</label>
                        <select name="wali_kelas_id" class="form-select" required>
                            <option value="">-- Pilih Wali Kelas --</option>
                            @foreach ($gurus as $guru)
                                <option value="{{ $guru->id }}"
                                    {{ old('wali_kelas_id', $kelas->wali_kelas_id) == $guru->id ? 'selected' : '' }}>
                                    {{ $guru->username }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ url('admin/kelas') }}" class="btn btn-secondary">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                        <button type="button" class="btn btn-success" onclick="editConfirm()">
                            <i class="ti ti-check"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function editConfirm() {
            Swal.fire({
                title: 'Simpan Perubahan?',
                text: 'Pastikan anda yakin dengan data yang anda masukkan.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Simpan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('updateForm').submit();
                }
            });
        }
    </script>
</x-admin>
