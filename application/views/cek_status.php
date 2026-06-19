<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status Pendaftaran - RS Sehat Bersama</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        body {
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

        .status-container {
            background: rgba(255, 255, 255, 0.92);
            max-width: 600px;
            margin: 0 auto;
            padding: 40px 35px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(10, 61, 98, 0.18);
            border-top: 4px solid #2ecc71;
            backdrop-filter: blur(4px);
            text-align: center;
        }

        .status-berhasil {
            color: #27ae60;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .info-pasien {
            text-align: left;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #3c6382;
            margin: 20px 0;
        }

        .info-pasien p {
            margin: 8px 0;
            font-size: 15px;
        }

        .status-badge {
            display: inline-block;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            margin: 10px 0;
        }

        .menunggu { background: #fff3cd; color: #856404; }
        .diterima { background: #d4edda; color: #155724; }
        .ditolak  { background: #f8d7da; color: #721c24; }
        .proses   { background: #d1ecf1; color: #0c5460; }

        .btn-kembali {
            display: inline-block;
            margin-top: 15px;
            padding: 12px 25px;
            background: #3c6382;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-kembali:hover {
            background: #0a3d62;
        }
    </style>
</head>
<body>

    <div class="nav-top">
        <div class="nav-menu">
            <a href="<?= site_url('pendaftaran') ?>">📋 Form Pendaftaran</a>
            <a href="<?= site_url('pendaftaran/cek_status') ?>" class="active">🔍 Cek Status</a>
        </div>
        <div class="nav-login">
            <a href="<?= site_url('login') ?>">👤 Login</a>
        </div>
    </div>

    <div class="status-container">
        <?php if($pasien): ?>
            <h2 class="status-berhasil">✅ PENDAFTARAN BERHASIL!</h2>
            <p>Terima kasih telah mendaftar. Data Anda telah tersimpan di sistem kami.</p>

            <div class="info-pasien">
                <p><strong>ID Pendaftaran:</strong> <?= $pasien->id_pasien ?></p>
                <p><strong>Nama Lengkap:</strong> <?= $pasien->nama ?></p>
                <p><strong>Dokter Tujuan:</strong> <?= $pasien->nama_dokter ?> (<?= $pasien->spesialis ?>)</p>
                <p><strong>Tanggal Kunjungan:</strong> <?= date('d-m-Y H:i', strtotime($pasien->tanggal_kunjungan)) ?></p>
                
                <p><strong>Status Pendaftaran:</strong><br>
                    <span class="status-badge <?= $pasien->status_pendaftaran ?>">
                        <?php 
                            if($pasien->status_pendaftaran == 'menunggu') echo '⏳ MENUNGGU VERIFIKASI';
                            if($pasien->status_pendaftaran == 'diterima') echo '✅ DITERIMA';
                            if($pasien->status_pendaftaran == 'ditolak') echo '❌ DITOLAK';
                            if($pasien->status_pendaftaran == 'proses') echo '🔄 SEDANG DIPROSES';
                        ?>
                    </span>
                </p>
            </div>

            <p>Simpan <strong>ID Pendaftaran</strong> di atas untuk cek status selanjutnya, atau <a href="<?= site_url('login/pasien') ?>">Login di sini</a> untuk melihat detail lengkap.</p>

        <?php else: ?>
            <h2>🔍 CEK STATUS PENDAFTARAN</h2>
            <p>Masukkan Nomor / ID Pendaftaran Anda:</p>
            <form method="post" action="<?= site_url('pendaftaran/proses_cek') ?>" style="margin-top:20px;">
                <input type="number" name="id_pasien" required placeholder="Contoh: 123" style="padding:12px; width:200px; border:2px solid #e0e0e0; border-radius:8px;">
                <button type="submit" style="padding:12px 20px; background:#3c6382; color:white; border:none; border-radius:8px; cursor:pointer;">Cek Sekarang</button>
            </form>
        <?php endif; ?>

        <a href="<?= site_url('pendaftaran') ?>" class="btn-kembali">← Daftar Pasien Baru Lagi</a>
    </div>

</body>
</html>