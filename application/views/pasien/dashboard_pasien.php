<h2 style="color:#2c3e50; margin-bottom:25px; border-bottom:2px solid #3498db; padding-bottom:10px;">📋 Data & Riwayat Pendaftaran Anda</h2>

<?php if(isset($profil) && $profil): ?>
<!-- KARTU DATA DIRI -->
<div style="background:#ffffff; padding:25px; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.1); margin-bottom:30px;">
    <h3 style="color:#2980b9; margin-bottom:15px;">👤 Halo, <strong><?=$profil->nama?></strong> 👋</h3>
    
    <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px; font-size:15px;">
        <div><strong>ID Pasien:</strong> <?=$profil->id_pasien?></div>
        <div><strong>Tanggal Lahir:</strong> <?=date('d-m-Y', strtotime($profil->tanggal_lahir))?></div>
        <div style="grid-column:1/-1;"><strong>Alamat:</strong> <?=$profil->alamat?></div>
        <div><strong>No. HP:</strong> <?=$profil->no_hp?></div>
    </div>

    <div style="margin-top:20px;">
        <a href="<?=site_url('pasien/daftar_baru')?>" class="btn" style="background:#28a745; color:white; padding:10px 20px; border-radius:6px; text-decoration:none; display:inline-block;">➕ Daftar Berobat Lagi</a>
    </div>
</div>


<!-- 🟢 RIWAYAT SEDANG BERJALAN -->
<h3 style="color:#27ae60; margin:30px 0 15px 0;">🟢 Sedang Berjalan</h3>
<div style="background:#ffffff; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.1); overflow:hidden; margin-bottom:30px;">
    <table style="width:100%; border-collapse:collapse;">
        <tr style="background:#f8f9fa;">
            <th style="padding:12px; text-align:left;">Tgl Kunjungan</th>
            <th style="padding:12px; text-align:left;">Keluhan</th>
            <th style="padding:12px; text-align:left;">Dokter Tujuan</th>
            <th style="padding:12px; text-align:left;">Status</th>
        </tr>
        <?php 
        $ada_berjalan = false;
        if(isset($semua_riwayat) && $semua_riwayat):
        foreach($semua_riwayat as $r): 
        
        // ✅ JAGA-JAGA JIKA KOLOM BELUM ADA, DIANGGAP BELUM SELESAI
        if(!isset($r->status_selesai) || $r->status_selesai == 'belum'):
        $ada_berjalan = true;
        ?>
        <tr style="border-bottom:1px solid #eee;">
            <td style="padding:12px;"><?=date('d-m-Y H:i', strtotime($r->tanggal_kunjungan))?></td>
            <td style="padding:12px;"><?=$r->keluhan?></td>
            <td style="padding:12px;"><?=$r->nama_dokter?><br><small><?=$r->spesialis?></small></td>
            <td style="padding:12px;">
                <?php if($r->status_pendaftaran == 'menunggu'): ?>
                    <span style="background:#fff3cd; color:#856404; padding:3px 8px; border-radius:10px;">⏳ Menunggu</span>
                <?php elseif($r->status_pendaftaran == 'diterima'): ?>
                    <span style="background:#d4edda; color:#155724; padding:3px 8px; border-radius:10px;">✅ Diterima</span>
                <?php elseif($r->status_pendaftaran == 'proses'): ?>
                    <span style="background:#d1ecf1; color:#0c5460; padding:3px 8px; border-radius:10px;">🔄 Proses</span>
                <?php else: ?>
                    <span style="background:#f8d7da; color:#721c24; padding:3px 8px; border-radius:10px;">❌ Ditolak</span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endif; endforeach; endif; ?>
        <?php if(!$ada_berjalan): ?>
        <tr>
            <td colspan="4" style="padding:20px; text-align:center; color:#888;">Tidak ada kunjungan yang sedang berjalan</td>
        </tr>
        <?php endif; ?>
    </table>
</div>


<!-- ✅ RIWAYAT SUDAH SELESAI -->
<h3 style="color:#34495e; margin:30px 0 15px 0;">✅ Riwayat Kunjungan Selesai</h3>
<div style="background:#ffffff; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.1); overflow:hidden;">
    <table style="width:100%; border-collapse:collapse;">
        <tr style="background:#f8f9fa;">
            <th style="padding:12px; text-align:left;">Tgl Kunjungan</th>
            <th style="padding:12px; text-align:left;">Keluhan</th>
            <th style="padding:12px; text-align:left;">Dokter Tujuan</th>
            <th style="padding:12px; text-align:left;">Keterangan</th>
        </tr>
        <?php 
        $ada_selesai = false;
        if(isset($semua_riwayat) && $semua_riwayat):
        foreach($semua_riwayat as $r): 
        
        // ✅ JAGA-JAGA JIKA KOLOM BELUM ADA, LEWATI
        if(isset($r->status_selesai) && $r->status_selesai == 'sudah'):
        $ada_selesai = true;
        ?>
        <tr style="border-bottom:1px solid #eee;">
            <td style="padding:12px;"><?=date('d-m-Y H:i', strtotime($r->tanggal_kunjungan))?></td>
            <td style="padding:12px;"><?=$r->keluhan?></td>
            <td style="padding:12px;"><?=$r->nama_dokter?><br><small><?=$r->spesialis?></small></td>
            <td style="padding:12px; color:#28a745; font-weight:500;">Selesai Ditangani</td>
        </tr>
        <?php endif; endforeach; endif; ?>
        <?php if(!$ada_selesai): ?>
        <tr>
            <td colspan="4" style="padding:20px; text-align:center; color:#888;">Belum ada riwayat kunjungan selesai</td>
        </tr>
        <?php endif; ?>
    </table>
</div>

<?php else: ?>
<div style="background:#f8d7da; color:#721c24; padding:20px; border-radius:8px; text-align:center;">
    ⚠️ Data profil tidak ditemukan, silakan login ulang!
</div>
<?php endif; ?>