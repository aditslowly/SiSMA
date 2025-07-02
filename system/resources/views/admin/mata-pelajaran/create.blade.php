<x-admin>
    <div class="container-fluid mt-4">
        <div class="card shadow-sm">
            <div class="card-header text-white">
                <h4 class="mb-0">Tambah Mata Pelajaran</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/mata-pelajaran') }}" method="POST">
                    @csrf

                    {{-- Alert Error Umum --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <input type="text" name="sekolah_id" value="{{ auth('admin')->user()->sekolah_id }}"
                            hidden />
                        {{-- Kolom Kiri --}}
                        <div class="col-md-6">
                            {{-- Kode Mapel --}}
                            <div class="mb-3">
                                <label for="kode_mapel" class="form-label">Kode Mapel</label>
                                <input type="text" id="kode_mapel" name="kode_mapel"
                                    class="form-control @error('kode_mapel') is-invalid @enderror"
                                    value="{{ old('kode_mapel') }}" required>
                                @error('kode_mapel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nama Mapel --}}
                            <div class="mb-3">
                                <label for="nama_mapel" class="form-label">Nama Mapel</label>
                                <input type="text" id="nama_mapel" name="nama_mapel"
                                    class="form-control @error('nama_mapel') is-invalid @enderror"
                                    value="{{ old('nama_mapel') }}" required>
                                @error('nama_mapel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Deskripsi --}}
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="mt-4 d-flex justify-content-start gap-2">
                        <a href="{{ url('admin/mata-pelajaran') }}" class="btn btn-secondary">
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
