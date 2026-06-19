<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pasien - RS Sehat Bersama</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        body {
            /* Latar belakang sama persis dengan halaman depan & admin */
            background: 
                linear-gradient(rgba(255, 255, 255, 0.75), rgba(240, 247, 255, 0.75)), 
                url('https://images.pexels.com/photos/668298/pexels-photo-668298.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Kotak Login */
        .login-box {
            background: rgba(255, 255, 255, 0.92);
            width: 100%;
            max-width: 400px;
            padding: 40px 35px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(10, 61, 98, 0.18);
            border-top: 4px solid #60a3bc;
            backdrop-filter: blur(4px);
        }

        .login-box h2 {
            text-align: center;
            color: #0a3d62;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .sub-title {
            text-align: center;
            color: #607d8b;
            font-size: 14px;
            margin-bottom: 25px;
        }

        /* Pesan Error / Notifikasi */
        .alert-error {
            background-color: #ffebee;
            color: #c62828;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            text-align: center;
            border: 1px solid #ffcdd2;
        }

        .alert-sukses {
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            text-align: center;
            border: 1px solid #c8e6c9;
        }

        /* Form Input */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #2c3e50;
            font-weight: 500;
            font-size: 15px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            background-color: #fafafa;
        }

        .form-group input:focus {
            outline: none;
            border-color: #60a3bc;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(96, 163, 188, 0.1);
        }

        /* Tombol */
        .btn-login {
            width: 100%;
            padding: 13px;
            background-color: #60a3bc;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 15px;
        }

        .btn-login:hover {
            background-color: #3c8dad;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(96, 163, 188, 0.25);
        }

        /* Link Bawah */
        .link-group {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .link-daftar, .link-kembali {
            color: #3c6382;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .link-daftar:hover, .link-kembali:hover {
            color: #0a3d62;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h2>👤 LOGIN PASIEN</h2>
        <p class="sub-title">Akses Data & Cek Status Pendaftaran</p>

        <!-- Pesan Notifikasi -->
        <?php if($this->session->flashdata('pesan_error')): ?>
            <div class="alert-error">
                ❌ <?= $this->session->flashdata('pesan_error') ?>
            </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('pesan_sukses')): ?>
            <div class="alert-sukses">
                ✅ <?= $this->session->flashdata('pesan_sukses') ?>
            </div>
        <?php endif; ?>

        <!-- Form Login -->
        <form method="post" action="<?= site_url('login/proses_pasien') ?>">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required placeholder="Masukkan username Anda">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Masukkan kata sandi">
            </div>

            <button type="submit" class="btn-login">Masuk ke Akun</button>
        </form>

        <div class="link-group">
            <a href="<?= site_url('pendaftaran') ?>" class="link-daftar">📋 Daftar Pasien Baru</a>
            <a href="<?= site_url('login') ?>" class="link-kembali">← Kembali</a>
        </div>
    </div>

</body>
</html>