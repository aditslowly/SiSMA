<x-master-admin>
    <div class="container-fluid mt-4">
        <!-- Tombol Tambah Data -->
        <div class="mb-3">
            <a href="{{ url('master-admin/data-admin/create') }}" class="btn btn-success">
                <i class="ti ti-plus"></i> Tambah Data
            </a>
        </div>

        <!-- Form Pencarian -->
        <div class="mb-3">
            <form method="GET" action="{{ url('master-admin/data-admin') }}" id="searchForm">
                <div class="input-group">
                    <input type="text" name="search" id="searchInput" class="form-control" placeholder="Cari data admin..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="ti ti-search"></i> Cari
                    </button>
                </div>
            </form>
        </div>

        <!-- Tabel Data Admin (responsive) -->
        <div class=" card table-responsive text-center">
            <div class="card-body">
                <table class="table table-bordered align-middle">
                    <thead class="text-center table-light">
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Foto Profil</th>
                            <th>Nama</th>
                            <th>No Handphone</th>
                            <th>Asal Sekolah</th>
                        </tr>
                    </thead>
                    <tbody class="align-center">
                        @forelse($admins as $index => $admin)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{ url('master-admin/data-admin/detail/'.$admin->id) }}" class="btn btn-info btn-sm mb-1">
                                    <i class="fs-5 ti ti-file-description"></i>
                                </a>
                                <a href="{{ url('master-admin/data-admin/edit/'.$admin->id) }}" class="btn btn-warning btn-sm mb-1">
                                    <i class="fs-5 ti ti-edit"></i>
                                </a>
                                <form action="{{ url('master-admin/data-admin/destroy/'.$admin->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mb-1">
                                        <i class="fs-5 ti ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <img src="{{ url('public/app/foto-admin/' . $admin->foto_profil) }}" alt="Foto Profil" width="80" height="80" class="img-thumbnail">
                            </td>
                            <td>{{ $admin->username }}</td>
                            <td>{{ $admin->phone}}</td>
                            <td>{{ $admin->sekolahs ? $admin->sekolahs->nama_sekolah : "Belum ditambahkan" }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data admin.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3">
            <div class="mb-2 mb-md-0">
                <span>Menampilkan {{$admins->firstItem() }} sampai {{$admins->lastItem()}} dari {{$admins->total()}} data</span>
            </div>
            <div>
                {{ $admins->links('pagination::bootstrap-5') }}
            </div>
        </div>

        <!-- Include SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function(e){
                    e.preventDefault();
                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Data admin akan dihapus secara permanen!",
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
                }, 500); // debounce 0.5 detik
            });
        </script>
    </div>
</x-master-admin>
