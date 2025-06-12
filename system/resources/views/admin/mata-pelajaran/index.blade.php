<x-admin>
    <div class="container-fluid mt-4">

        <!-- Form Tambah & Export -->
        <div class="row mb-3 d-flex justify-content-between">
            <div class="col-12 col-md-2 mb-2">
                <a href="{{ url('admin/mata-pelajaran/create') }}" class="btn btn-success w-100">
                    <i class="ti ti-plus"></i> Tambah Mapel
                </a>
            </div>

            <div class="col-12 col-md-2 mb-2">
                <button type="button" class="btn btn-primary w-100" id="exportBtn">
                    <i class="ti ti-upload"></i> Export
                </button>
            </div>
        </div>

        <!-- Form Search -->
        <div class="mb-3">
            <form method="GET" action="{{ url('admin/mata-pelajaran') }}" id="searchForm">
                <div class="input-group">
                    <input type="text" name="search" id="searchInput" class="form-control"
                        placeholder="Cari data mata pelajaran..." value="{{ request('search') }}">
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
                        <th>Kode Mapel</th>
                        <th>Nama Mapel</th>
                        <th>Deskripsi</th>
                        <th>Guru</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mapels as $index => $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="d-flex justify-content-center flex-wrap gap-1">
                                <a href="{{ url('admin/mata-pelajaran/edit/' . $item->id) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="fs-5 ti ti-edit"></i>
                                </a>
                                <form action="{{ url('admin/mata-pelajaran/destroy/' . $item->id) }}" method="POST"
                                    class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fs-5 ti ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <td>{{ $item->kode_mapel }}</td>
                            <td>{{ $item->nama_mapel }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->gurus ? $item->gurus->username : 'Belum ada guru' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data tidak ada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3">
            <div class="mb-2 mb-md-0">
                <span>Menampilkan {{ $mapels->firstItem() }} sampai {{ $mapels->lastItem() }} dari {{ $mapels->total() }} data</span>
            </div>
            <div>
                {{ $mapels->links('pagination::bootstrap-5') }}
            </div>
        </div>

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            // Tombol Export
            document.getElementById('exportBtn').addEventListener('click', function () {
                Swal.fire({
                    title: 'Export Data Mata Pelajaran',
                    text: "Data Mata Pelajaran akan diekspor!",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, export!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ url('admin/mata-pelajaran/export') }}";
                    }
                });
            });

            // Konfirmasi Hapus
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Data mapel akan dihapus secara permanen!",
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

            // Debounce Search
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
