<x-admin>
    <div class="container mt-4">
        <h4>Edit Mapel</h4>
        <form action="{{ url('admin/mata-pelajaran/' . $mapel->id) }}" method="POST">
            @csrf
            @method('PUT')

            @if ($errors->any())
                @foreach ($errors->all() as $message)
                    <div class="alert alert-danger">{{ $message }}</div>
                @endforeach
            @endif

            <div class="row">
                <!-- Left Column: Kode, Nama, Deskripsi -->
                <input type="text" name="sekolah_id" value="{{auth('admin')->user()->sekolah_id}}" hidden>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="kode_mapel" class="form-label">Kode Mapel</label>
                        <input type="text" class="form-control @error('kode_mapel') is-invalid @enderror"
                            id="kode_mapel" name="kode_mapel" value="{{ old('kode_mapel', $mapel->kode_mapel) }}"
                            required>
                        @error('kode_mapel') <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_mapel" class="form-label">Nama Mapel</label>
                        <input type="text" class="form-control @error('nama_mapel') is-invalid @enderror"
                            id="nama_mapel" name="nama_mapel" value="{{ old('nama_mapel', $mapel->nama_mapel) }}"
                            required>
                        @error('nama_mapel')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="4">{{ old('deskripsi', $mapel->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Right Column: Pilih Guru (Dropdown) -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="guru_id" class="form-label">Guru Mapel</label>
                        <select class="form-control @error('guru_id') is-invalid @enderror" name="guru_id" id="guru_id" required>
                            <option value="" disabled selected>Pilih Guru</option>
                            @foreach ($gurus as $guru)
                                <option value="{{ $guru->id }}" {{ old('guru_id', $mapel->guru_id) == $guru->id ? 'selected' : '' }}>
                                    {{ $guru->username ?? 'Tanpa Nama' }}
                                </option>
                            @endforeach
                        </select>
                        @error('guru_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-3 d-flex gap-2">
                <a href="{{ url('admin/mata-pelajaran') }}" class="btn btn-secondary">
                    <i class="ti ti-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="ti ti-check"></i> Update
                </button>
            </div>
        </form>
    </div>
</x-admin>
