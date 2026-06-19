<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendaftaran Pasien - RS Sehat Bersama</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        body {
            background: 
                linear-gradient(rgba(255, 255, 255, 0.80), rgba(240, 247, 255, 0.80)), 
                url('https://images.pexels.com/photos/668298/pexels-photo-668298.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .rs-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .rs-header h1 {
            color: #0a3d62;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .rs-header p {
            color: #3c6382;
            font-size: 15px;
            margin-top: 8px;
            font-weight: 500;
        }

        .kotak {
            background: rgba(255, 255, 255, 0.90);
            width: 100%;
            max-width: 420px;
            padding: 40px 35px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(10, 61, 98, 0.2);
            border-top: 4px solid #3c6382;
        }

        .kotak h2 {
            text-align: center;
            color: #2c3e50;
            font-size: 20px;
            margin-bottom: 30px;
            font-weight: 600;
        }

        /* ✅ TOMBOL PALING DASAR, AMAN, DAN PASTI KERJA */
        .tombol {
            display: block;
            width: 100%;
            padding: 15px 20px;
            margin: 12px 0;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 500;
            text-align: center;
            cursor: pointer;
        }

        .tombol-admin {
            background-color: #3c6382;
            color: #ffffff;
        }
        .tombol-admin:hover {
            background-color: #0a3d62;
        }

        .tombol-pasien {
            background-color: #60a3bc;
            color: #ffffff;
        }
        .tombol-pasien:hover {
            background-color: #3c8dad;
        }

        .tombol-daftar {
            background-color: #f1f5f9;
            color: #0a3d62;
            border: 2px solid #cbd5e1 !important;
        }
        .tombol-daftar:hover {
            background-color: #e0f2fe;
        }

        .footer-note {
            text-align: center;
            margin-top: 30px;
            color: #0a3d62;
            font-size: 13px;
        }
    </style>
</head>
<body>

    <div class="rs-header">
        <h1>🏥 RUMAH SAKIT SEHAT BERSAMA</h1>
        <p>Sistem Informasi Pendaftaran Pasien Online</p>
    </div>

    <div class="kotak">
        <h2>Silakan Pilih Akses</h2>

        <!-- ✅ CARA INI TIDAK AKAN PERNAH GAGAL DIKLIK -->
        <form action="http://localhost/sistem_rs/login/admin" method="get">
            <button type="submit" class="tombol tombol-admin">🔐 Login Administrator</button>
        </form>

        <form action="http://localhost/sistem_rs/login/pasien" method="get">
            <button type="submit" class="tombol tombol-pasien">👤 Login Pasien / Cek Status</button>
        </form>

        <form action="http://localhost/sistem_rs/pendaftaran" method="get">
            <button type="submit" class="tombol tombol-daftar">📋 Daftar Pasien Baru</button>
        </form>

    </div>

    <div class="footer-note">
        © 2026 - Sistem Pendaftaran Pasien Berbasis Web
    </div>

</body>
</html>