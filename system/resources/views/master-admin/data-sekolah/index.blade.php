<!-- filepath: /Applications/XAMPP/xamppfiles/htdocs/siakad/system/resources/views/master-admin/data-sekolah/index.blade.php -->
<x-master-admin>
    <div class="container-fluid mt-4">
        <!-- Button Tambah Data -->
        <div class="mb-3">
            <a href="{{ url('master-admin/data-sekolah/create') }}" class="btn btn-success">
                <i class="ti ti-plus"></i> Tambah Data
            </a>
        </div>

        <!-- Form Search -->
        <div class="mb-3">
            <form method="GET" action="{{ url('master-admin/data-sekolah') }}" id="searchForm">
                <div class="input-group">
                    <input type="text" name="search" id="searchInput" class="form-control" placeholder="Cari data sekolah..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="ti ti-search"></i> Cari
                    </button>
                </div>
            </form>
        </div>

        <!-- Table Data Sekolah (responsive) -->
        <div class="card table-responsive text-center">
            <div class="card-body">
                <table class="table table-bordered align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Logo Sekolah</th>
                            <th>Nama Sekolah</th>
                            <th>NPSN</th>
                            <th>Akreditasi</th>
                            <th>Kurikulum</th>
                            <th>Status Aktif</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse($sekolahs as $index => $sekolah)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{ url('master-admin/data-sekolah/detail/'.$sekolah->id) }}" class="btn btn-info btn-sm mb-1">
                                    <i class="fs-5 ti ti-file-description"></i>
                                </a>
                                <a href="{{ url('master-admin/data-sekolah/edit/'.$sekolah->id) }}" class="btn btn-warning btn-sm mb-1">
                                    <i class="fs-5 ti ti-edit"></i>
                                </a>
                                <form action="{{ url('master-admin/data-sekolah/destroy/'.$sekolah->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mb-1">
                                        <i class="fs-5 ti ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <img src="{{ url('public/app/data-sekolah/' . $sekolah->logo_sekolah) }}" alt="Logo Sekolah" width="100" height="100" class="img-thumbnail">
                            </td>
                            <td>{{ $sekolah->nama_sekolah }}</td>
                            <td>{{ $sekolah->npsn }}</td>
                            <td>{{ $sekolah->akreditasi }}</td>
                            <td>{{ $sekolah->kurikulum }}</td>
                            <td>
                                <span class="badge {{$sekolah->status_aktif === 'Aktif' ? 'bg-success' : 'bg-danger'}}">
                                    {{ucfirst($sekolah->status_aktif)}}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data sekolah.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Pagination -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3">
        <div class="mb-2 mb-md-0">
            <span>Menampilkan {{$sekolahs->firstItem() }} sampai {{$sekolahs->lastItem()}} dari {{$sekolahs->total()}} data</span>
        </div>
        <div>
            {{ $sekolahs->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // SweetAlert delete confirmation
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e){
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data sekolah akan dihapus secara permanen!",
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

        // Live search dengan debounce
        const searchInput = document.getElementById('searchInput');
        const searchForm = document.getElementById('searchForm');
        let debounceTimeout;

        searchInput.addEventListener('input', () => {
            clearTimeout(debounceTimeout);
            debounceTimeout = setTimeout(() => {
                searchForm.submit();
            }, 500); // Waktu debounce 0.5 detik
        });
    </script>
</x-master-admin>
