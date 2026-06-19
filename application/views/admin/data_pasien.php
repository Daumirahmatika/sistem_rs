<h2 class="judul-halaman">👥 Daftar & Kelola Data Pasien</h2>

<div class="kotak">
    <div style="overflow-x:auto;">
        <table width="100%" cellpadding="12" cellspacing="0" style="border-collapse:collapse;">
            <thead>
                <tr style="background: linear-gradient(90deg, #0a3d62, #3c6382); color:white;">
                    <th style="padding:15px; text-align:left; border-radius:8px 0 0 8px;">No</th>
                    <th style="padding:15px; text-align:left;">Nama Lengkap</th>
                    <th style="padding:15px; text-align:left;">Tgl Kunjungan</th>
                    <th style="padding:15px; text-align:left;">Dokter Tujuan</th>
                    <th style="padding:15px; text-align:left;">Status</th>
                    <th style="padding:15px; text-align:center; border-radius:0 8px 8px 0;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($pasien as $p): ?>
                <tr style="border-bottom:1px solid #e0e0e0; transition:background 0.2s;">
                    <td style="padding:12px;"><?=$no++?></td>
                    <td style="padding:12px; font-weight:500;"><?=$p->nama?></td>
                    <td style="padding:12px; color:#555;"><?=$p->tanggal_kunjungan?></td>
                    <td style="padding:12px; color:#555;"><?=$p->nama_dokter?></td>
                    <td style="padding:12px;">
                        <?php if($p->status_pendaftaran == 'menunggu'): ?>
                            <span style="background:#fff3cd; color:#856404; padding:4px 10px; border-radius:12px; font-size:13px; font-weight:500;">⏳ Menunggu</span>
                        <?php elseif($p->status_pendaftaran == 'proses'): ?>
                            <span style="background:#d1ecf1; color:#0c5460; padding:4px 10px; border-radius:12px; font-size:13px; font-weight:500;">🔄 Diproses</span>
                        <?php elseif($p->status_pendaftaran == 'diterima'): ?>
                            <span style="background:#d4edda; color:#155724; padding:4px 10px; border-radius:12px; font-size:13px; font-weight:500;">✅ Diterima</span>
                        <?php else: ?>
                            <span style="background:#f8d7da; color:#721c24; padding:4px 10px; border-radius:12px; font-size:13px; font-weight:500;">❌ Ditolak</span>
                        <?php endif; ?>
                    </td>
                    <td style="padding:12px; text-align:center;">
                        <a href="<?=site_url('admin/ubah_status/'.$p->id_pasien.'/diterima')?>" style="background:#28a745; color:white; padding:5px 10px; border-radius:4px; text-decoration:none; font-size:12px; margin:2px;">Terima</a>
                        <a href="<?=site_url('admin/ubah_status/'.$p->id_pasien.'/proses')?>" style="background:#17a2b8; color:white; padding:5px 10px; border-radius:4px; text-decoration:none; font-size:12px; margin:2px;">Proses</a>
                        <a href="<?=site_url('admin/ubah_status/'.$p->id_pasien.'/ditolak')?>" style="background:#ffc107; color:#212529; padding:5px 10px; border-radius:4px; text-decoration:none; font-size:12px; margin:2px;">Tolak</a>
                        <a href="<?=site_url('admin/hapus/'.$p->id_pasien)?>" onclick="return confirm('Yakin hapus data ini?')" style="background:#dc3545; color:white; padding:5px 10px; border-radius:4px; text-decoration:none; font-size:12px; margin:2px;">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>