<h2 style="margin-bottom:20px; color:#2c3e50;">📋 Kelola Data Pasien</h2>

<a href="<?=site_url('admin/tambah_pasien')?>" class="btn" style="background:#28a745; color:white; padding:10px 20px; border-radius:6px; text-decoration:none; display:inline-block; margin-bottom:15px;">➕ Tambah Data Pasien</a>

<div style="background:#ffffff; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.1); overflow:hidden;">
    <table style="width:100%; border-collapse:collapse;">
        <tr style="background:#f8f9fa;">
            <th style="padding:12px; text-align:center; width:5%;">No</th>
            <th style="padding:12px; text-align:center; width:7%;">ID AKUN<br>(Tetap)</th>
            <th style="padding:12px; text-align:center; width:7%;">ID DAFTAR<br>(Baru)</th>
            <th style="padding:12px; text-align:left;">Nama Lengkap</th>
            <th style="padding:12px; text-align:center;">Tgl Kunjungan</th>
            <th style="padding:12px; text-align:left;">Dokter Tujuan</th>
            <th style="padding:12px; text-align:center;">Status</th>
            <th style="padding:12px; text-align:center; width:22%;">Aksi</th>
        </tr>
        <?php $no=1; foreach($semua_pasien as $p): ?>
        <tr style="border-bottom:1px solid #eee;">
            <td style="padding:12px; text-align:center;"><?=$no++?></td>
            
            <!-- ID AKUN (SELALU SAMA) -->
            <td style="padding:12px; text-align:center; font-weight:bold; color:#007bff;">
                <?=$p->id_akun_pasien?>
            </td>

            <!-- ID PENDAFTARAN (BERUBAH) -->
            <td style="padding:12px; text-align:center; font-weight:bold; color:#dc3545;">
                <?=$p->id_pasien?>
            </td>

            <td style="padding:12px;"><?=$p->nama?></td>
            <td style="padding:12px; text-align:center;"><?=date('d-m-Y H:i', strtotime($p->tanggal_kunjungan))?></td>
            <td style="padding:12px;"><?=$p->nama_dokter?><br><small><?=$p->spesialis?></small></td>
            
            <!-- ✅ BAGIAN STATUS DIPERBAIKI: JIKA SELESAI, TAMPILKAN HANYA SELESAI -->
            <td style="padding:12px; text-align:center;">
                <?php if($p->status_selesai == 'sudah'): ?>
                    <span style="background:#6610f2; color:white; padding:5px 10px; border-radius:10px; font-weight:bold;">✅ SELESAI</span>
                <?php else: ?>
                    <?php if($p->status_pendaftaran == 'menunggu'): ?>
                        <span style="background:#fff3cd; color:#856404; padding:5px 10px; border-radius:10px;">⏳ Menunggu</span>
                    <?php elseif($p->status_pendaftaran == 'diterima'): ?>
                        <span style="background:#d4edda; color:#155724; padding:5px 10px; border-radius:10px;">✅ Diterima</span>
                    <?php elseif($p->status_pendaftaran == 'proses'): ?>
                        <span style="background:#d1ecf1; color:#0c5460; padding:5px 10px; border-radius:10px;">🔄 Proses</span>
                    <?php elseif($p->status_pendaftaran == 'ditolak'): ?>
                        <span style="background:#f8d7da; color:#721c24; padding:5px 10px; border-radius:10px;">❌ Ditolak</span>
                    <?php endif; ?>
                <?php endif; ?>
            </td>

            <!-- ✅ BAGIAN AKSI: JIKA SELESAI, TOMBOL TIDAK PERLU MUNCUL SEMUA -->
            <td style="padding:12px; text-align:center;">
                <?php if($p->status_selesai == 'sudah'): ?>
                    <!-- Kalau sudah selesai, cuma ada Edit & Hapus -->
                    <a href="<?=site_url('admin/edit_pasien/'.$p->id_pasien)?>" class="btn" style="background:#007bff; color:white; padding:4px 8px; border-radius:4px; text-decoration:none; font-size:12px;">Edit</a>
                    <a href="<?=site_url('admin/hapus_pasien/'.$p->id_pasien)?>" class="btn" style="background:#dc3545; color:white; padding:4px 8px; border-radius:4px; text-decoration:none; font-size:12px; margin-top:4px;" onclick="return confirm('Yakin hapus?')">Hapus</a>
                <?php else: ?>
                    <!-- Kalau BELUM selesai, muncul semua tombol -->
                    <a href="<?=site_url('admin/ubah_status/'.$p->id_pasien.'/diterima')?>" class="btn" style="background:#28a745; color:white; padding:4px 8px; border-radius:4px; text-decoration:none; font-size:12px;">Terima</a>
                    <a href="<?=site_url('admin/ubah_status/'.$p->id_pasien.'/proses')?>" class="btn" style="background:#17a2b8; color:white; padding:4px 8px; border-radius:4px; text-decoration:none; font-size:12px;">Proses</a>
                    <a href="<?=site_url('admin/ubah_status/'.$p->id_pasien.'/ditolak')?>" class="btn" style="background:#dc3545; color:white; padding:4px 8px; border-radius:4px; text-decoration:none; font-size:12px;">Tolak</a>
                    <a href="<?=site_url('admin/ubah_selesai/'.$p->id_pasien)?>" class="btn" style="background:#6610f2; color:white; padding:4px 8px; border-radius:4px; text-decoration:none; font-size:12px;">Selesai</a>
                    <br>
                    <a href="<?=site_url('admin/edit_pasien/'.$p->id_pasien)?>" class="btn" style="background:#007bff; color:white; padding:4px 8px; border-radius:4px; text-decoration:none; font-size:12px; margin-top:4px;">Edit</a>
                    <a href="<?=site_url('admin/hapus_pasien/'.$p->id_pasien)?>" class="btn" style="background:#dc3545; color:white; padding:4px 8px; border-radius:4px; text-decoration:none; font-size:12px; margin-top:4px;" onclick="return confirm('Yakin hapus?')">Hapus</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>