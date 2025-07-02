<x-admin>
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Detail Kelas</h4>
            </div>

            <div class="card-body">

                {{-- Info Wali Kelas dan Tahun Ajar --}}
                <div class="row mb-4">
                    <div class="col-md-6">
                        <strong>Wali Kelas:</strong>
                        <ul class="mb-0">
                            @foreach ($kelas->pivot_guru as $pg)
                                <li>{{ $pg->guru->nama ?? $pg->guru->username }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <strong>Tahun Ajar:</strong>
                        <ul class="mb-0">
                            @foreach ($kelas->pivot_guru as $pg)
                                <li>{{ $pg->tahun_ajar->tahun_ajar }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- Informasi Umum Kelas --}}
                <div class="mb-4">
                    <strong>Nama Kelas:</strong> {{ $kelas->nama_kelas }} <br>
                    <strong>Tingkat:</strong> {{ $kelas->tingkat }} <br>
                    <strong>Jurusan:</strong> {{ $kelas->jurusan }}
                </div>

                {{-- Daftar Siswa --}}
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>NISN</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswaList as $index => $siswa)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $siswa->nama_siswa }}</td>
                                    <td>{{ $siswa->nisn }}</td>
                                    <td>{{ ucfirst($siswa->jenis_kelamin) }}</td>
                                    <td>{{ $siswa->email }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada siswa terdaftar di kelas ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <a href="{{ url('admin/kelas') }}" class="btn btn-secondary">
                    <i class="ti ti-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</x-admin>
