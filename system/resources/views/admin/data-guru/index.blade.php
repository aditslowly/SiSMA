<x-admin>
    <div class="container-fluid mt-4">

        <!-- Form Tambah & Import -->
        <div class="row mb-3 d-flex justify-content-between">
            <div class="col-12 col-md-2 mb-2">
                <a href="{{ url('admin/guru/create') }}" class="btn btn-success w-100 w-md-40">
                    <i class="ti ti-plus"></i> Tambah Guru
                </a>
            </div>

            <div class="col-12 col-md-3 mb-2">
                <div class="d-flex flex-column flex-md-row justify-content-md-end align-items-stretch gap-2">
                    <form action="{{ url('admin/guru/import') }}" method="POST" enctype="multipart/form-data"
                        class="d-flex align-items-center gap-2 w-100 w-md-auto" id="importForm">
                        @csrf
                        <input type="file" name="file" id="fileInput" class="d-none" accept=".xlsx,.xls" required>
                        <button type="submit" class="btn btn-success w-100 w-md-auto" id="importBtn">
                            <i class="ti ti-download"></i> Import
                        </button>
                    </form>

                    <button type="button" class="btn btn-primary w-100 w-md-auto" id="exportBtn">
                        <i class="ti ti-upload"></i> Export
                    </button>
                </div>
            </div>
        </div>

        <!-- Form Search -->
        <div class="mb-3">
            <form method="GET" action="{{ url('admin/guru') }}" id="searchForm">
                <div class="input-group">
                    <input type="text" name="search" id="searchInput" class="form-control"
                        placeholder="Cari data gurus..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="ti ti-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Table -->
        <div class="table-responsive text-center overflow-auto">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Aksi</th>
                        <th>Nama Guru</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th>Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($gurus as $index => $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="d-flex justify-content-center flex-wrap gap-1">
                                <a href="{{ url('admin/guru/detail/' . $item->id) }}"
                                    class="btn btn-info btn-sm">
                                    <i class="fs-5 ti ti-file-description"></i>
                                </a>
                                <a href="{{ url('admin/guru/edit/' . $item->id) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="fs-5 ti ti-edit"></i>
                                </a>
                                <form action="{{ url('admin/guru/destroy/' . $item->id) }}" method="POST"
                                    class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fs-5 ti ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->jenis_kelamin == 'Laki-Laki' ? 'Laki-Laki' : 'Perempuan' }}</td>
                            <td>
                                <span class="badge {{$item->status === 'Aktif' ? 'bg-success' : 'bg-danger'}}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td>{{ $item->jabatan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data gurus.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3">
            <div class="mb-2 mb-md-0">
                <span>Menampilkan {{ $gurus->firstItem() }} sampai {{ $gurus->lastItem() }} dari
                    {{ $gurus->total() }} data</span>
            </div>
            <div>
                {{ $gurus->links('pagination::bootstrap-5') }}
            </div>
        </div>

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            const importForm = document.getElementById('importForm');
            const fileInput = document.getElementById('fileInput');
            const importBtn = document.getElementById('importBtn');

            importBtn.addEventListener('click', function() {
                fileInput.click();
            })

            fileInput.addEventListener('change', () => {
                if (fileInput.files.length > 0) {
                    importForm.submit();
                }
            })

            // Export untuk konfirmasi hapus data
            document.getElementById('exportBtn').addEventListener('click', function() {
                Swal.fire({
                    title: 'Export Data Guru',
                    text: 'Apakah anda yakin ingin mengekspor data guru?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, export!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ url('admin/guru/export') }}";
                    }
                })
            })

            // SweetAlert untuk konfirmasi hapus data
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Data gurus akan dihapus secara permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            const searchInput = document.getElementById('searchInput');
            const searchForm = document.getElementById('searchForm');
            let debounceTimeout;

            searchInput.addEventListener('input', () => {
                clearTimeout(debounceTimeout);
                debounceTimeout = setTimeout(() => {
                    searchForm.submit();
                }, 500);
            })
        </script>
    </div>
</x-admin>
