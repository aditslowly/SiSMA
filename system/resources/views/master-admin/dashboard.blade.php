<x-master-admin>
    <div class="container-fluid p-4">
        <div class="row g-3 justify-content-center">
            <!-- Copywriting dengan Card -->
            <div class="row mt-5 justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-body text-center">
                            <h4 class="fw-bold">Selamat Datang di Dashboard {{$masterAdmin->username}} 👋</h4>
                            <p class="mb-0">
                                Kelola seluruh sekolah dan admin secara terpusat.
                                Dengan sistem ini, Anda dapat mengawasi aktivitas dan perkembangan pendidikan dari seluruh sekolah dalam satu platform.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Total Admin -->
            <div class="col-6 col-md-3">
                <div class="card text-white bg-primary text-center shadow">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="ti ti-user" style="font-size: 40px;"></i>
                        <h6 class="mt-2">Jumlah Admin</h6>
                        <h3>{{ $totalAdmin ?? '0' }}</h3>
                    </div>
                </div>
            </div>

            <!-- Card Total Sekolah -->
            <div class="col-6 col-md-3">
                <div class="card text-white bg-success text-center shadow">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="ti ti-home" style="font-size: 40px;"></i>
                        <h6 class="mt-2">Jumlah Sekolah</h6>
                        <h3>{{ $totalSekolah ?? '0' }}</h3>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-master-admin>
