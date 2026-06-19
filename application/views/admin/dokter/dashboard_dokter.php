<h2 style="margin-bottom:20px; color:#2c3e50;">👨‍⚕️ Kelola Data Dokter</h2>

<a href="<?=site_url('admin/tambah_dokter')?>" class="btn" style="background:#28a745; color:white; padding:10px 20px; border-radius:6px; text-decoration:none; display:inline-block; margin-bottom:15px;">➕ Tambah Dokter Baru</a>

<div style="background:#ffffff; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.1); overflow:hidden;">
    <table style="width:100%; border-collapse:collapse;">
        <tr style="background:#f8f9fa;">
            <th style="padding:12px; text-align:center; width:5%;">No</th>
            <th style="padding:12px; text-align:left;">Nama Dokter</th>
            <th style="padding:12px; text-align:left;">Spesialis / Bidang</th>
            <th style="padding:12px; text-align:left;">Jadwal Praktek</th>
            <th style="padding:12px; text-align:center; width:15%;">Aksi</th>
        </tr>
        <?php $no=1; foreach($semua_dokter as $d): ?>
        <tr style="border-bottom:1px solid #eee;">
            <td style="padding:12px; text-align:center;"><?=$no++?></td>
            <td style="padding:12px; font-weight:500;"><?=$d->nama_dokter?></td>
            <td style="padding:12px;"><?=$d->spesialis?></td>
            <!-- ✅ DIPERBAIKI: Kalau kosong, tampilkan tanda strip -->
            <td style="padding:12px;">
                <?= isset($d->jadwal_praktek) && !empty($d->jadwal_praktek) ? $d->jadwal_praktek : '-' ?>
            </td>
            <td style="padding:12px; text-align:center;">
                <a href="<?=site_url('admin/edit_dokter/'.$d->id_dokter)?>" class="btn" style="background:#007bff; color:white; padding:6px 12px; border-radius:4px; text-decoration:none; font-size:13px;">Edit</a>
                <a href="<?=site_url('admin/hapus_dokter/'.$d->id_dokter)?>" class="btn" style="background:#dc3545; color:white; padding:6px 12px; border-radius:4px; text-decoration:none; font-size:13px; margin-left:4px;" onclick="return confirm('Yakin hapus data dokter ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>

        <?php if(empty($semua_dokter)): ?>
        <tr>
            <td colspan="5" style="padding:20px; text-align:center; color:#888;">Belum ada data dokter</td>
        </tr>
        <?php endif; ?>
    </table>
</div>