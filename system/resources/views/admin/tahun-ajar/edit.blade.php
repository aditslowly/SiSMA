<x-admin>
    <div class="container-fluid">
        <div class="card">
            <h4>Edit Tahun Ajar</h4>
        </div>
        <div class="card-body">
            <form id="updateForm" action="{{url('admin/tahun-ajar/' . $tahunAjar->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" name="sekolah_id" value="{{auth('admin')->user()->sekolah_id}}" hidden/>
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
                    <input type="text" name="tahun_ajar" class="form-control" value="{{old('tahun_ajar', $tahunAjar->tahun_ajar)}}" placeholder="Contoh: 2024/2025">
                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" value="{{old('deskripsi', $tahunAjar->deskripsi)}}" >
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="Aktif" {{old('status') == 'Aktif' ? 'selected' : ''}}>Aktif</option>
                        <option value="Nonaktif" {{old('status') == 'Nonaktif' ? 'selected' : ''}}>Nonaktif</option>
                    </select>
                </div>

                {{-- Dokumen Upload --}}
                <div class="mb-3">
                    <label for="dokumen" class="form-label">Dokumen</label>
                    <input type="file" name="dokumen" class="form-control" placeholder="Drag Or Import Document PDF">
                </div>

                {{-- Submit Button --}}
                <button type="button" class="btn btn-primary" onclick="editConfirm()">
                    <i class="ti ti-check"></i> Simpan Perubahan
                </button>
                <a href="{{url('admin/tahun-ajar')}}" class="btn btn-success">
                    <i class="ti ti-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function editConfirm()
        {
            Swal.fire({
                title: 'Simpan Perubahan?',
                text: 'Pastikan anda yakin dengan data yang anda masukkan!!',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Simpan',
                cancelButtonText: 'Batalkan',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('updateForm').submit();
                }
            });
        }
    </script>
</x-admin>
