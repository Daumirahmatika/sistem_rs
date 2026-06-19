<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - RS Sehat Bersama</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        body {
            /* Latar belakang sama persis dengan halaman depan */
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
            border-top: 4px solid #3c6382;
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
            border-color: #3c6382;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(60, 99, 130, 0.1);
        }

        /* Tombol */
        .btn-login {
            width: 100%;
            padding: 13px;
            background-color: #3c6382;
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
            background-color: #0a3d62;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(60, 99, 130, 0.25);
        }

        .link-kembali {
            display: block;
            text-align: center;
            color: #3c6382;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .link-kembali:hover {
            color: #0a3d62;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h2>🔐 LOGIN ADMIN</h2>
        <p class="sub-title">Panel Pengelolaan Data Rumah Sakit</p>

        <!-- Pesan Error (Muncul kalau salah password) -->
        <?php if($this->session->flashdata('pesan')): ?>
            <div class="alert-error">
                ✅ <?= $this->session->flashdata('pesan') ?>
            </div>
        <?php endif; ?>

        <!-- 🔽 FORM ISIAN LENGKAP, SUDAH DIPERBAIKI 🔽 -->
        <form method="post" action="<?= site_url('login/proses_admin') ?>">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required placeholder="Masukkan username Anda">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Masukkan kata sandi">
            </div>

            <button type="submit" class="btn-login">Masuk ke Sistem</button>
        </form>

        <a href="<?= site_url('login') ?>" class="link-kembali">← Kembali ke Halaman Utama</a>
    </div>

</body>
</html>