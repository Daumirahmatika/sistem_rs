<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Pasien - RS Sehat Bersama</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        .kop {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .kop h1 {
            font-size: 18px;
            margin: 0;
            font-weight: bold;
        }
        .kop p {
            font-size: 12px;
            margin: 2px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table th {
            border: 1px solid #000;
            padding: 8px;
            background: #f0f0f0;
            text-align: center;
            font-weight: bold;
        }
        table td {
            border: 1px solid #000;
            padding: 8px;
            vertical-align: top;
        }
        .text-center { text-align: center; }
        .text-left { text-align: left; }
        .footer {
            margin-top: 30px;
            text-align: right;
        }
    </style>
</head>
<body>

    <!-- ✅ KOP LAPORAN -->
    <div class="kop">
        <h1>RUMAH SAKIT SEHAT BERSAMA</h1>
        <p>Jl. Kesehatan No. 123, Jakarta Barat</p>
        <p>Telp: (021) 1234567 | Email: info@rssehatbersama.co.id</p>
    </div>

    <h3 style="text-align: center; margin-bottom: 15px;">LAPORAN DATA SELURUH PASIEN TERDAFTAR</h3>
    <p style="text-align: right; margin-bottom: 10px;">Tanggal Cetak: <?= date('d-m-Y H:i') ?></p>

    <!-- ✅ TABEL ISI DATA -->
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Nama Lengkap</th>
                <th width="10%">Tgl Lahir</th>
                <th width="18%">Alamat</th>
                <th width="10%">No. HP</th>
                <th width="17%">Dokter / Spesialis</th>
                <th width="10%">Tgl Kunjungan</th>
                <th width="10%">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($pasien as $p): ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td class="text-left"><strong><?= $p->nama ?></strong></td>
                <td class="text-center"><?= date('d-m-Y', strtotime($p->tanggal_lahir)) ?></td>
                <td class="text-left"><?= $p->alamat ?></td>
                <td class="text-center"><?= $p->no_hp ?></td>
                <td class="text-left"><?= $p->nama_dokter ?> <br><small>(<?= $p->spesialis ?>)</small></td>
                <td class="text-center"><?= date('d-m-Y', strtotime($p->tanggal_kunjungan)) ?></td>
                <td class="text-center">
                    <?php 
                    if($p->status_pendaftaran == 'menunggu') echo 'Menunggu';
                    elseif($p->status_pendaftaran == 'diterima') echo 'Diterima';
                    elseif($p->status_pendaftaran == 'proses') echo 'Proses';
                    else echo 'Ditolak';
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>

            <?php if(empty($pasien)): ?>
            <tr>
                <td colspan="8" class="text-center">Tidak ada data pasien.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- ✅ TANDA TANGAN -->
    <div class="footer">
        <p>Jakarta, <?= date('d F Y') ?></p>
        <br><br><br>
        <p><u>Administrator RS</u></p>
    </div>

</body>
</html>