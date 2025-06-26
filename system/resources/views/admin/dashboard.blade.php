<x-admin>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Selamat Datang Kembali!',
                text: '{{session('success')}}',
                icon: 'success',
                confirmButtonText: 'OK',
            })
        </script>
    @endif

    @if (session('error'))
        <script>
            title: 'Gagal Masuk!',
            text: '{{session('error')}}',
            icon: 'error',
            confirmButtonText: 'Coba Lagi',
        </script>
    @endif

    <div class="container-fluid p-4">
        <div class="row g-3 justify-content-center">
            <div class="row mt-5 justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-body text-center">
                            <h4 class="fw-bold">Selamat Datang di Sistem Informasi Akademik</h4>
                            <h4 class="fw-bold">{{Auth::user()->username}} 👋</h4>
                            <p class="mb-0">
                                Apa yang akan kamu lakukan hari ini?
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Jumlah Siswa -->
            <div class="col-6 col-md-3">
                <div class="card text-white bg-success text-center shadow">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="ti ti-users" style="font-size: 40px;"></i>
                        <h6 class="mt-2">Jumlah Siswa</h6>
                        <h3>{{ $totalSiswa ?? '0' }}</h3>
                    </div>
                </div>
            </div>

            <!-- Card Jumlah Guru -->
            <div class="col-6 col-md-3">
                <div class="card text-white bg-info text-center shadow">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="ti ti-user" style="font-size: 40px;"></i>
                        <h6 class="mt-2">Jumlah Guru</h6>
                        <h3>{{ $totalGuru ?? '0' }}</h3>
                    </div>
                </div>
            </div>

            <!-- Card Jumlah Kelas -->
            <div class="col-6 col-md-3">
                <div class="card text-white bg-primary text-center shadow">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="ti ti-building" style="font-size: 40px;"></i>
                        <h6 class="mt-2">Jumlah Kelas</h6>
                        <h3>{{ $totalKelas ?? '0' }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</x-admin>
