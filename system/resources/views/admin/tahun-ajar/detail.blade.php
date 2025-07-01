<x-admin>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4>Detail Tahun Ajar</h4>
            </div>
            <div class="card-body">

                {{-- Tahun Ajar --}}
                <div class="mb-3">
                    <label class="form-label">Tahun Ajar</label>
                    <input type="text" class="form-control" value="{{ $tahunAjar->tahun_ajar }}" readonly>
                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" value="{{ $tahunAjar->deskripsi }}" readonly>
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <input type="text" class="form-control" value="{{ $tahunAjar->status }}" readonly>
                </div>

                {{-- Dokumen (Link jika ada) --}}
                <div class="mb-3">
                    <label class="form-label">Dokumen</label>
                    @if($tahunAjar->dokumen)
                        <a href="{{ url('public/app/data-dokumen/' . $tahunAjar->dokumen) }}" target="_blank" class="btn btn-outline-primary">
                            <i class="ti ti-eye"></i> Lihat Dokumen
                        </a>
                    @else
                        <p class="text-muted">Tidak ada dokumen</p>
                    @endif
                </div>

                {{-- Tombol Kembali --}}
                <a href="{{ url('admin/tahun-ajar') }}" class="btn btn-secondary">
                    <i class="ti ti-arrow-left"></i> Kembali
                </a>

            </div>
        </div>
    </div>
</x-admin
