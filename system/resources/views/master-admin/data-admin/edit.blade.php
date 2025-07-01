<x-master-admin>
    <div class="container-fluid">
        <h4 class="mb-4">Edit Data Admin</h4>
        <form action="{{ url('master-admin/data-admin/'.$admin->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card mb-3">
                <div class="row g-0">
                    <!-- Form Input -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nama</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan nama admin" value="{{ $admin->username }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" value="{{ $admin->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Nomor HP</label>
                                <input type="number" name="phone" id="phone" class="form-control" placeholder="Masukkan nomor HP" value="{{ $admin->phone }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Kosongkan jika tidak ingin diubah">
                            </div>
                            <div class="mb-3">
                                <label for="sekolah_id" class="form-label">Asal Sekolah</label>
                                <select name="sekolah_id" id="sekolah_id" class="form-select">
                                    <option value=""disabled selected>Pilih sekolah</option>
                                    @foreach ($sekolahs as $sekolah)
                                        <option value="{{$sekolah->id}}"{{$admin->sekolah_id == $sekolah->id ? 'selected' : ''}}>{{$sekolah->nama_sekolah}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="foto_profil" class="form-label">Foto Profil</label>
                                <input type="file" name="foto_profil" id="foto_profil" class="form-control" onchange="previewImage(event)">
                            </div>
                        </div>
                    </div>
                    <!-- Preview Foto -->
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            @if($admin->foto_profil)
                                <img id="preview" src="{{ url('public/app/foto-admin/' . $admin->foto_profil) }}" alt="Preview Foto Profil" class="img-fluid rounded" style="max-width: 250px;">
                            @else
                                <img id="preview" src="#" alt="Preview Foto Profil" class="img-fluid rounded" style="display: none; max-width: 150px;">
                            @endif
                            <p id="previewText" @if($admin->foto_profil) style="display: none;" @endif>Preview foto akan muncul disini.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-secondary" onclick="window.history.back();">
                    <i class="ti ti-arrow-left"></i> Kembali
                </button>
                <button type="submit" class="btn btn-success">
                    <i class="ti ti-check"></i> Update Data
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const previewText = document.getElementById('previewText');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(){
                    preview.src = reader.result;
                    preview.style.display = 'block';
                    previewText.style.display = 'none';
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
                previewText.style.display = 'block';
            }
        }

        // Auto-hide alert after 4 seconds (jika ada alert)
        setTimeout(() => {
            const alertEl = document.querySelector('.alert');
            if(alertEl) {
                alertEl.style.display = 'none';
            }
        }, 4000);
    </script>
</x-master-admin>

