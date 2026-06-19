<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Pasien Baru - RS Sehat Bersama</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        body {
            /* Latar belakang sama persis semua halaman */
            background: 
                linear-gradient(rgba(255, 255, 255, 0.75), rgba(240, 247, 255, 0.75)), 
                url('https://images.pexels.com/photos/668298/pexels-photo-668298.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            min-height: 100vh;
            padding: 30px 20px;
        }

        /* Navigasi Atas */
        .nav-top {
            background: linear-gradient(90deg, #0a3d62, #3c6382);
            color: #ffffff;
            padding: 15px 30px;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(10, 61, 98, 0.15);
        }

        .nav-menu a {
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 5px;
            border-radius: 8px;
            font-weight: 500;
            transition: background 0.3s ease;
        }

        .nav-menu a.active, .nav-menu a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .nav-login a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
            padding: 8px 16px;
            border: 2px solid #ffffff;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-login a:hover {
            background-color: #ffffff;
            color: #0a3d62;
        }

        /* Kotak Form Utama */
        .form-container {
            background: rgba(255, 255, 255, 0.92);
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 35px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(10, 61, 98, 0.18);
            border-top: 4px solid #3c6382;
            backdrop-filter: blur(4px);
        }

        .form-container h2 {
            text-align: center;
            color: #0a3d62;
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        /* Pesan Notifikasi */
        .alert {
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            text-align: center;
        }
        .alert-sukses { background: #e8f5e9; color: #2e7d32; border: 1px solid #c8e6c9; }
        .alert-error { background: #ffebee; color: #c62828; border: 1px solid #ffcdd2; }

        /* Grup Form */
        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #2c3e50;
            font-weight: 500;
            font-size: 15px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            background-color: #fafafa;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #3c6382;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(60, 99, 130, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .pemisah {
            border-top: 1px dashed #cbd5e1;
            margin: 25px 0;
            position: relative;
        }
        .pemisah span {
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            background: #ffffff;
            padding: 0 15px;
            color: #607d8b;
            font-weight: 500;
        }

        /* Tombol Simpan */
        .btn-simpan {
            width: 100%;
            padding: 14px;
            background: linear-gradient(90deg, #0a3d62, #3c6382);
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-simpan:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(10, 61, 98, 0.25);
        }

        /* Responsif HP */
        @media (max-width: 600px) {
            .nav-top {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            .form-container {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>

    <!-- 🔹 NAVIGASI ATAS -->
    <div class="nav-top">
        <div class="nav-menu">
            <a href="<?= site_url('pendaftaran') ?>" class="active">📋 Form Pendaftaran</a>
            <a href="<?= site_url('pendaftaran/cek_status') ?>">🔍 Cek Status</a>
        </div>
        <div class="nav-login">
            <a href="<?= site_url('login') ?>">👤 Login</a>
        </div>
    </div>

    <!-- 🔹 KOTAK FORM PENDAFTARAN -->
    <div class="form-container">
        <h2>🏥 FORM PENDAFTARAN PASIEN BARU</h2>

        <!-- Notifikasi -->
        <?php if($this->session->flashdata('pesan_sukses')): ?>
            <div class="alert alert-sukses">✅ <?= $this->session->flashdata('pesan_sukses') ?></div>
        <?php endif; ?>
        <?php if($this->session->flashdata('pesan_error')): ?>
            <div class="alert alert-error">❌ <?= $this->session->flashdata('pesan_error') ?></div>
        <?php endif; ?>

        <!-- Form Isian -->
        <form method="post" action="<?= site_url('pendaftaran/simpan') ?>">
            
            <div class="form-group">
                <label>Nama Lengkap Pasien</label>
                <input type="text" name="nama" required placeholder="Contoh: Budi Santoso">
            </div>

            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" required>
            </div>

            <div class="form-group">
                <label>Alamat Lengkap</label>
                <textarea name="alamat" required placeholder="Masukkan alamat lengkap sesuai KTP"></textarea>
            </div>

            <div class="form-group">
                <label>No. Telepon / HP</label>
                <input type="tel" name="no_hp" required placeholder="Contoh: 08123456789">
            </div>

            <div class="form-group">
                <label>Keluhan Penyakit / Gejala</label>
                <textarea name="keluhan" required placeholder="Jelaskan keluhan atau gejala yang dirasakan"></textarea>
            </div>

            <div class="form-group">
                <label>Tanggal & Jam Kunjungan</label>
                <input type="datetime-local" name="tanggal_kunjungan" required>
            </div>

            <div class="form-group">
                <label>Pilih Dokter / Spesialis</label>
                <select name="id_dokter" required>
                    <option value="">-- Pilih Dokter Tujuan --</option>
                    <?php foreach($dokter as $d): ?>
                        <option value="<?= $d->id_dokter ?>"><?= $d->nama_dokter ?> - <?= $d->spesialis ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Pemisah -->
            <div class="pemisah"><span>🔐 BUAT AKUN LOGIN ANDA</span></div>

            <div class="form-group">
                <label>Username (Untuk Login)</label>
                <input type="text" name="username" required placeholder="Buat username unik">
            </div>

            <div class="form-group">
                <label>Password (Kata Sandi)</label>
                <input type="password" name="password" required placeholder="Buat kata sandi minimal 4 karakter">
            </div>

            <button type="submit" class="btn-simpan">✅ DAFTAR & SIMPAN DATA</button>
        </form>
    </div>

</body>
</html>