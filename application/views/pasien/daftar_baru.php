<h2 class="judul">➕ Daftar Berobat Baru</h2>

<div class="kotak">
    <form method="post" action="<?=site_url('pasien/simpan_daftar_baru')?>">

        <!-- ✅ DIPERBAIKI: Ambil id_pasien dari objek -->
        <?php 
            $id_akun = $this->session->userdata('pasien');
            if(is_object($id_akun)){
                $id_akun = $id_akun->id_pasien;
            }
        ?>
        <input type="hidden" name="id_akun_pasien" value="<?= (int)$id_akun ?>">

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; width:100%;">
            
            <div class="form-group" style="grid-column: 1 / -1;">
                <label>Keluhan / Gejala Sakit Saat Ini</label>
                <textarea name="keluhan_baru" class="form-control" rows="4" required style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;" placeholder="Jelaskan keluhan atau gejala yang dirasakan sekarang..."></textarea>
            </div>

            <div class="form-group">
                <label>Dokter Tujuan</label>
                <select name="id_dokter" class="form-control" required style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
                    <option value="">-- Pilih Dokter --</option>
                    <?php foreach($dokter as $d): ?>
                    <option value="<?=$d->id_dokter?>"><?=$d->nama_dokter?> - <?=$d->spesialis?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal & Jam Kunjungan</label>
                <input type="datetime-local" name="tanggal_kunjungan" class="form-control" required style="width:100%; padding:12px; border:1px solid #ddd; border-radius:8px;">
            </div>

        </div>

        <div style="margin-top:25px; text-align:center;">
            <button type="submit" class="btn btn-sukses" style="padding:12px 30px; font-size:16px;">Kirim Pendaftaran</button>
            <a href="<?=site_url('pasien/dashboard')?>" class="btn btn-bahaya" style="padding:12px 30px; font-size:16px; margin-left:10px;">Batal</a>
        </div>
    </form>
</div>