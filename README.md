# 🎓 SIAKAD SISMA

SIAKAD SISMA adalah aplikasi **Sistem Informasi Akademik Sekolah Menengah** berbasis web yang dibangun menggunakan **Laravel 11**. Aplikasi ini bertujuan untuk mempermudah manajemen data akademik seperti kelas, guru, siswa, mata pelajaran, tahun ajaran, dan distribusi pengajaran.

---

## ✨ Fitur Utama

- Manajemen Tahun Ajaran
- Manajemen Guru & Siswa
- Manajemen Kelas & Wali Kelas
- Manajemen Mata Pelajaran
- Distribusi Mapel ke Kelas & Guru
- Penugasan Siswa ke Kelas
- Relasi fleksibel melalui tabel pivot `anggota`
- Sistem autentikasi multi-role (Master Admin, Admin Sekolah, Guru, Siswa, Orang Tua)

---

## 🧱 Arsitektur Database

- `kelas` : menyimpan data kelas
- `guru`, `siswa` : menyimpan pengguna berdasarkan peran
- `mapel` : menyimpan data mata pelajaran
- `tahun_ajar` : tahun ajaran akademik aktif
- `anggota` : pivot table utama yang menghubungkan `kelas`, `mapel`, `guru`, `siswa`, dan `tahun_ajar`

---

## 🚀 Instalasi

1. **Clone Repo**
   ```bash
   git clone https://github.com/namakamu/siakad_sisma.git
   cd siakad_sisma
