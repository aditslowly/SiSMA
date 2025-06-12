<x-admin>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Tahun Ajar</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/tahun-ajar') }}" method="POST">
                    @csrf
                    <input type="text" name="" id="" value="{{auth('admin')->user()->asal_sekolah_id}}" hidden>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Tahun Ajar --}}
                    <div class="mb-3">
                        <label for="tahun_ajar" class="form-label">Tahun Ajar</label>
                        <input type="text" name="tahun_ajar" id="tahun_ajar"
                            class="form-control @error('tahun_ajar') is-invalid @enderror"
                            value="{{ old('tahun_ajar') }}" placeholder="Contoh: 2024/2025">
                        @error('tahun_ajar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status"
                            class="form-select @error('status') is-invalid @enderror">
                            <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Nonaktif" {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol Submit --}}
                    <button type="submit" class="btn btn-primary">
                        <i class="ti ti-check"></i> Simpan</button>
                    <a href="{{ url('admin/tahun-ajar') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left"></i> Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-admin>
