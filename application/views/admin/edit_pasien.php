<h2 style="margin-bottom:20px; color:#2c3e50;">✏️ Ubah Data Pasien</h2>

<div style="background:#ffffff; padding:25px; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.1);">

    <?php if($this->session->flashdata('pesan')): ?>
    <div style="padding:12px; margin-bottom:15px; border-radius:6px; text-align:center; 
    <?= strpos($this->session->flashdata('pesan'), 'GAGAL') !== false ? 'background:#f8d7da; color:#721c24;' : 'background:#d4edda; color:#155724;' ?>">
        <?=$this->session->flashdata('pesan')?>
    </div>
    <?php endif; ?>

    <form method="post" action="<?=site_url('admin/update_pasien')?>">

        <!-- ID Utama (Tersembunyi) -->
        <input type="hidden" name="id_pasien" value="<?= isset($pasien->id_pasien) ? $pasien->id_pasien : '' ?>">
        <input type="hidden" name="id_akun_pasien" value="<?= isset($pasien->id_akun_pasien) ? $pasien->id_akun_pasien : '' ?>">

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; width:100%;">
            
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;" 
                value="<?= isset($pasien->nama) ? $pasien->nama : '' ?>">
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;" 
                value="<?= isset($pasien->tanggal_lahir) ? $pasien->tanggal_lahir : '' ?>">
            </div>
            <div class="form-group" style="grid-column: 1 / -1;">
                <label>Alamat Lengkap</label>
                <textarea name="alamat" class="form-control" rows="3" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;"><?= isset($pasien->alamat) ? $pasien->alamat : '' ?></textarea>
            </div>
            <div class="form-group">
                <label>No. HP / Telepon</label>
                <input type="text" name="no_hp" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;" 
                value="<?= isset($pasien->no_hp) ? $pasien->no_hp : '' ?>">
            </div>
            <div class="form-group">
                <label>Dokter Tujuan</label>
                <select name="id_dokter" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
                    <option value="">-- Pilih Dokter --</option>
                    <?php foreach($dokter as $d): ?>
                    <option value="<?=$d->id_dokter?>" <?= (isset($pasien->id_dokter) && $pasien->id_dokter == $d->id_dokter) ? 'selected' : '' ?>>
                        <?=$d->nama_dokter?> - <?=$d->spesialis?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group" style="grid-column: 1 / -1;">
                <label>Keluhan / Penyakit</label>
                <textarea name="keluhan" class="form-control" rows="3" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;"><?= isset($pasien->keluhan) ? $pasien->keluhan : '' ?></textarea>
            </div>
            <div class="form-group">
                <label>Tanggal Kunjungan</label>
                <input type="datetime-local" name="tanggal_kunjungan" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;" 
                value="<?= isset($pasien->tanggal_kunjungan) ? date('Y-m-d\TH:i', strtotime($pasien->tanggal_kunjungan)) : '' ?>">
            </div>
            <div class="form-group">
                <label>Status Pendaftaran</label>
                <select name="status_pendaftaran" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
                    <option value="menunggu" <?= (isset($pasien->status_pendaftaran) && $pasien->status_pendaftaran == 'menunggu') ? 'selected' : '' ?>>⏳ Menunggu</option>
                    <option value="diterima" <?= (isset($pasien->status_pendaftaran) && $pasien->status_pendaftaran == 'diterima') ? 'selected' : '' ?>>✅ Diterima</option>
                    <option value="proses" <?= (isset($pasien->status_pendaftaran) && $pasien->status_pendaftaran == 'proses') ? 'selected' : '' ?>>🔄 Proses</option>
                    <option value="ditolak" <?= (isset($pasien->status_pendaftaran) && $pasien->status_pendaftaran == 'ditolak') ? 'selected' : '' ?>>❌ Ditolak</option>
                </select>
            </div>
            <div class="form-group">
                <label>Status Selesai Berobat</label>
                <select name="status_selesai" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
                    <option value="belum" <?= (isset($pasien->status_selesai) && $pasien->status_selesai == 'belum') ? 'selected' : '' ?>>❌ Belum Selesai</option>
                    <option value="sudah" <?= (isset($pasien->status_selesai) && $pasien->status_selesai == 'sudah') ? 'selected' : '' ?>>✅ Sudah Selesai</option>
                </select>
            </div>
        </div>

        <div style="margin-top:25px; text-align:center;">
            <button type="submit" class="btn" style="background:#007bff; color:white; padding:12px 30px; font-size:16px; border:none; border-radius:6px; cursor:pointer;">💾 Simpan Perubahan</button>
            <a href="<?=site_url('admin/dashboard')?>" class="btn" style="background:#6c757d; color:white; padding:12px 30px; font-size:16px; border-radius:6px; text-decoration:none; margin-left:10px;">Batal</a>
        </div>

    </form>
</div>