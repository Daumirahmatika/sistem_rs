<h2 style="margin-bottom:10px; color:#2c3e50;">📄 Laporan & Statistik Data Pasien</h2>
<hr style="margin-bottom:20px;">

<!-- ==============================================
📊 BAGIAN STATISTIK & RINGKASAN (INI YANG DIMINTA DOSEN)
============================================== -->
<div style="display:grid; grid-template-columns:repeat(5, 1fr); gap:15px; margin-bottom:25px;">
    
    <div style="background:#007bff; color:white; padding:15px; border-radius:8px; text-align:center; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
        <h3 style="font-size:28px; margin:0;">
            <?php 
                $total = 0; 
                foreach($pasien as $d) { $total++; } 
                echo $total;
            ?>
        </h3>
        <p style="margin:5px 0 0 0; font-size:14px;">Total Seluruh Pasien</p>
    </div>

    <div style="background:#ffc107; color:#212529; padding:15px; border-radius:8px; text-align:center; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
        <h3 style="font-size:28px; margin:0;">
            <?php 
                $menunggu = 0; 
                foreach($pasien as $d) { if($d->status_pendaftaran == 'menunggu') $menunggu++; } 
                echo $menunggu;
            ?>
        </h3>
        <p style="margin:5px 0 0 0; font-size:14px;">Menunggu</p>
    </div>

    <div style="background:#28a745; color:white; padding:15px; border-radius:8px; text-align:center; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
        <h3 style="font-size:28px; margin:0;">
            <?php 
                $terima = 0; 
                foreach($pasien as $d) { if($d->status_pendaftaran == 'diterima') $terima++; } 
                echo $terima;
            ?>
        </h3>
        <p style="margin:5px 0 0 0; font-size:14px;">Diterima</p>
    </div>

    <div style="background:#17a2b8; color:white; padding:15px; border-radius:8px; text-align:center; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
        <h3 style="font-size:28px; margin:0;">
            <?php 
                $proses = 0; 
                foreach($pasien as $d) { if($d->status_pendaftaran == 'proses') $proses++; } 
                echo $proses;
            ?>
        </h3>
        <p style="margin:5px 0 0 0; font-size:14px;">Sedang Proses</p>
    </div>

    <div style="background:#6610f2; color:white; padding:15px; border-radius:8px; text-align:center; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
        <h3 style="font-size:28px; margin:0;">
            <?php 
                $selesai = 0; 
                foreach($pasien as $d) { if(isset($d->status_selesai) && $d->status_selesai == 'sudah') $selesai++; } 
                echo $selesai;
            ?>
        </h3>
        <p style="margin:5px 0 0 0; font-size:14px;">Selesai Berobat</p>
    </div>

</div>

<div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:25px;">
    <!-- Statistik per Dokter -->
    <div style="background:#ffffff; padding:15px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
        <h4 style="color:#2c3e50; margin-top:0;">👨‍⚕️ Jumlah Pasien per Dokter</h4>
        <?php
            // Hitung jumlah pasien per dokter
            $stat_dokter = [];
            foreach($pasien as $d){
                $nama_dok = $d->nama_dokter ?? 'Tidak Ada';
                if(!isset($stat_dokter[$nama_dok])) $stat_dokter[$nama_dok] = 0;
                $stat_dokter[$nama_dok]++;
            }
            arsort($stat_dokter); // Urutkan dari terbanyak
        ?>
        <?php foreach($stat_dokter as $nama => $jml): ?>
        <div style="margin:8px 0;">
            <span style="width:150px; display:inline-block;"><?=$nama?></span>
            <div style="background:#e9ecef; width:calc(100% - 160px); height:20px; display:inline-block; border-radius:4px; overflow:hidden;">
                <div style="background:#28a745; width:<?=($jml/$total)*100?>%; height:100%; text-align:center; color:white; font-size:12px; line-height:20px;">
                    <?=$jml?> pasien
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Statistik Keadaan -->
    <div style="background:#ffffff; padding:15px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
        <h4 style="color:#2c3e50; margin-top:0;">📊 Persentase Keadaan Pasien</h4>
        <div style="margin-top:15px; font-size:15px;">
            <div>✅ Diterima : <strong><?=round(($terima/$total)*100,1)?>%</strong></div>
            <div>⏳ Menunggu : <strong><?=round(($menunggu/$total)*100,1)?>%</strong></div>
            <div>🔄 Proses : <strong><?=round(($proses/$total)*100,1)?>%</strong></div>
            <div>❌ Ditolak : <strong><?=round((($total-$terima-$menunggu-$proses-$selesai)/$total)*100,1)?>%</strong></div>
            <div>🎯 Selesai : <strong><?=round(($selesai/$total)*100,1)?>%</strong></div>
        </div>
    </div>
</div>


<!-- ==============================================
📋 BAGIAN DAFTAR LENGKAP (KAMU SUDAH PUNYA, SAYA PERINDAH)
============================================== -->
<div style="background:#ffffff; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.1); overflow:hidden;">
    
    <div style="padding:15px; border-bottom:1px solid #eee; display:flex; gap:10px; justify-content:flex-end;">
        <button onclick="window.print()" class="btn" style="background:#28a745; color:white; padding:8px 15px; border-radius:4px; border:none; cursor:pointer;">🖨️ Cetak Halaman</button>
        <a href="<?=site_url('admin/cetak_pdf')?>" class="btn" style="background:#dc3545; color:white; padding:8px 15px; border-radius:4px; text-decoration:none;">📄 Unduh PDF</a>
    </div>

    <table style="width:100%; border-collapse:collapse;">
        <tr style="background:#2c3e50; color:white;">
            <th style="padding:12px; text-align:center; width:5%;">No</th>
            <th style="padding:12px; text-align:left;">Nama Lengkap</th>
            <th style="padding:12px; text-align:center;">Tgl Lahir</th>
            <th style="padding:12px; text-align:left;">Alamat</th>
            <th style="padding:12px; text-align:center;">No. HP</th>
            <th style="padding:12px; text-align:left;">Dokter / Spesialis</th>
            <th style="padding:12px; text-align:center;">Tgl Kunjungan</th>
            <th style="padding:12px; text-align:center;">Status</th>
        </tr>
        <?php $no=1; foreach($pasien as $p): ?>
        <tr style="border-bottom:1px solid #eee;">
            <td style="padding:12px; text-align:center;"><?=$no++?></td>
            <td style="padding:12px; font-weight:500;"><?=$p->nama?></td>
            <td style="padding:12px; text-align:center;"><?=date('d-m-Y', strtotime($p->tanggal_lahir))?></td>
            <td style="padding:12px;"><?=$p->alamat?></td>
            <td style="padding:12px; text-align:center;"><?=$p->no_hp?></td>
            <td style="padding:12px;">
                <?=$p->nama_dokter?>
                <small style="color:#666;">(<?=$p->spesialis?>)</small>
            </td>
            <td style="padding:12px; text-align:center;"><?=date('d-m-Y H:i', strtotime($p->tanggal_kunjungan))?></td>
            <td style="padding:12px; text-align:center;">
                <?php if(isset($p->status_selesai) && $p->status_selesai == 'sudah'): ?>
                    <span style="background:#6610f2; color:white; padding:3px 8px; border-radius:10px;">✅ SELESAI</span>
                <?php else: ?>
                    <?php if($p->status_pendaftaran == 'menunggu'): ?>
                        <span style="background:#fff3cd; color:#856404; padding:3px 8px; border-radius:10px;">⏳ Menunggu</span>
                    <?php elseif($p->status_pendaftaran == 'diterima'): ?>
                        <span style="background:#d4edda; color:#155724; padding:3px 8px; border-radius:10px;">✅ Diterima</span>
                    <?php elseif($p->status_pendaftaran == 'proses'): ?>
                        <span style="background:#d1ecf1; color:#0c5460; padding:3px 8px; border-radius:10px;">🔄 Proses</span>
                    <?php elseif($p->status_pendaftaran == 'ditolak'): ?>
                        <span style="background:#f8d7da; color:#721c24; padding:3px 8px; border-radius:10px;">❌ Ditolak</span>
                    <?php endif; ?>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>