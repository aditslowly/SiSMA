<x-admin>
    <div class="container-fluid mt-4">

        <!-- Form Tambah & Export -->
        <div class="row mb-3 d-flex justify-content-between">
            <div class="col-12 col-md-2 mb-2">
                <a href="{{ url('admin/tahun-ajar/create') }}" class="btn btn-success w-100 w-md-40">
                    <i class="ti ti-plus"></i> Tahun Ajaran
                </a>
            </div>

            <div class="col-12 col-md-3 mb-2">
                <div class="d-flex flex-column flex-md-row justify-content-md-end align-items-stretch gap-2">
                    <button type="button" class="btn btn-primary w-100 w-md-auto" id="exportBtn">
                        <i class="ti ti-upload"></i> Export
                    </button>
                </div>
            </div>
        </div>

        <!-- Form Search -->
        <div class="mb-3">
            <form method="GET" action="{{ url('admin/tahun-ajar') }}" id="searchForm">
                <div class="input-group">
                    <input type="text" name="search" id="searchInput" class="form-control"
                        placeholder="Cari tahun ajaran..." value="{{ request('search') }}">
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
                        <th>Tahun Ajaran</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tahunAjar as $item)
                        <tr>
                            <td>{{ $loop->iteration + ($tahunAjar->currentPage() - 1) * $tahunAjar->perPage() }}</td>
                            <td class="d-flex justify-content-center flex-wrap gap-1">
                                <a href="{{ url('admin/tahun-ajar/show/' . $item->id) }}" class="btn btn-info btn-sm" title="Detail">
                                    <i class="fs-5 ti ti-file-description"></i>
                                </a>
                                <a href="{{ url('admin/tahun-ajar/edit/' . $item->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fs-5 ti ti-edit"></i>
                                </a>
                                <form action="{{ url('admin/tahun-ajar/destroy/' . $item->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fs-5 ti ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <td>{{ $item->tahun_ajar }}</td>
                            <td>
                                <span class="badge {{ $item->status === 'Aktif' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center fw-bold text-danger">
                                Data tidak ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3">
            <div class="mb-2 mb-md-0">
                <span>Menampilkan {{ $tahunAjar->firstItem() ?? 0 }} sampai {{ $tahunAjar->lastItem() ?? 0 }} dari {{ $tahunAjar->total() ?? 0 }} data</span>
            </div>
            <div>
                {{ $tahunAjar->links('pagination::bootstrap-5') }}
            </div>
        </div>

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            // Export confirmation
            document.getElementById('exportBtn').addEventListener('click', function() {
                Swal.fire({
                    title: 'Export Data Tahun Ajaran',
                    text: 'Apakah anda yakin ingin mengekspor data tahun ajaran?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, export!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ url('admin/tahun-ajar/export') }}";
                    }
                })
            });

            // Delete confirmation
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Data tahun ajaran akan dihapus secara permanen!",
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

            // Search debounce
            const searchInput = document.getElementById('searchInput');
            const searchForm = document.getElementById('searchForm');
            let debounceTimeout;

            searchInput.addEventListener('input', () => {
                clearTimeout(debounceTimeout);
                debounceTimeout = setTimeout(() => {
                    searchForm.submit();
                }, 500);
            });
        </script>

    </div>
</x-admin>
