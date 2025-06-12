<x-admin>
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <!-- Foto di bagian atas -->
                        <div class="text-center mb-4">
                            @if($siswa->foto)
                                <img src="{{ url('public/app/data-siswa/' . $siswa->foto) }}" alt="Foto Profil" class="img-fluid rounded" style="max-height: 300px;">
                            @else
                                <div class="bg-light text-center py-5 text-muted">
                                    <i class="ti ti-user" style="font-size: 48px;"></i><br>
                                    Belum ada foto
                                </div>
                            @endif
                        </div>

                        <h5 class="card-title mb-4 text-center">{{ $siswa->nama_siswa }}</h5>

                        @php
                            $fieldList = [
                                'NISN' => $siswa->nisn,
                                'NIS' => $siswa->nis,
                                'Jenis Pendaftaran' => $siswa->jenis_pendaftaran,
                                'Jalur Pendaftaran' => $siswa->jalur_pendaftaran,
                                'Tanggal Masuk' => $siswa->tanggal_masuk,
                                'Status' => $siswa->status,
                                'Kebutuhan Khusus' => $siswa->kebutuhan_khusus,
                                'Email' => $siswa->email,
                                'No KK' => $siswa->no_kk,
                                'NIK' => $siswa->nik,
                                'Jenis Kelamin' => $siswa->jenis_kelamin,
                                'Agama' => $siswa->agama,
                                'Tempat Lahir' => $siswa->tempat_lahir,
                                'Tanggal Lahir' => $siswa->tanggal_lahir,
                                'Alamat' => $siswa->alamat,
                                'Telepon' => $siswa->telepon,
                            ];
                        @endphp

                        @foreach ($fieldList as $label => $value)
                            <div class="mb-3">
                                <label class="form-label fw-bold">{{ $label }}</label>
                                <input type="text" class="form-control" value="{{ $value }}" readonly>
                            </div>
                        @endforeach

                        <div class="text-end">
                            <a href="{{ url('admin/siswa') }}" class="btn btn-secondary mt-2">
                                <i class="ti ti-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
