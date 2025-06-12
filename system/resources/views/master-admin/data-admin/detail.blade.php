<x-master-admin>
    <div class="container-fluid">
        <h4 class="mb-4">Detail Data Admin</h4>
        <div class="card mb-3">
            <div class="row g-0">
                <!-- Data Detail dalam mode read-only -->
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" value="{{ $admin->username }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ $admin->email }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" value="{{ $admin->phone }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="Password" class="form-control" value="{{ $admin->password }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Asal Sekolah</label>
                            <input type="text" class="form-control" value="{{ $admin->asal_sekolah }}" readonly>
                        </div>
                    </div>
                </div>
                <!-- Preview Foto -->
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        @if($admin->foto_profil)
                            <img src="{{ url('public/app/foto-admin/' . $admin->foto_profil) }}" alt="Foto Profil" class="img-fluid rounded" style="max-width: 250px;">
                        @else
                            <img src="#" alt="Foto Profil" class="img-fluid rounded" style="display: none; max-width: 250px;">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-outline-secondary" onclick="window.history.back();">
            <i class="ti ti-arrow-left"></i> Kembali
        </button>
    </div>
</x-master-admin>
