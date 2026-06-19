<h2 class="judul">➕ Tambah Data Pasien Baru</h2>

<div class="kotak">
    <form method="post" action="<?=site_url('admin/simpan_pasien')?>">
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; width:100%;">
            
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
            </div>
            <div class="form-group" style="grid-column: 1 / -1;">
                <label>Alamat Lengkap</label>
                <textarea name="alamat" class="form-control" rows="3" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;"></textarea>
            </div>
            <div class="form-group">
                <label>No. HP / Telepon</label>
                <input type="text" name="no_hp" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
            </div>
            <div class="form-group">
                <label>Dokter Tujuan</label>
                <select name="id_dokter" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
                    <option value="">-- Pilih Dokter --</option>
                    <?php foreach($dokter as $d): ?>
                    <option value="<?=$d->id_dokter?>"><?=$d->nama_dokter?> - <?=$d->spesialis?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group" style="grid-column: 1 / -1;">
                <label>Keluhan / Penyakit</label>
                <textarea name="keluhan" class="form-control" rows="3" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;"></textarea>
            </div>
            <div class="form-group">
                <label>Tanggal Kunjungan</label>
                <input type="datetime-local" name="tanggal_kunjungan" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
            </div>
            <div class="form-group">
                <label>Status Pendaftaran</label>
                <select name="status_pendaftaran" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
                    <option value="menunggu">⏳ Menunggu</option>
                    <option value="diterima">✅ Diterima</option>
                    <option value="proses">🔄 Proses</option>
                    <option value="ditolak">❌ Ditolak</option>
                </select>
            </div>
            <div class="form-group">
                <label>Username Akun</label>
                <input type="text" name="username" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
            </div>
            <div class="form-group">
                <label>Password Akun</label>
                <input type="password" name="password" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
            </div>
        </div>

        <div style="margin-top:25px; text-align:center;">
            <button type="submit" class="btn btn-sukses" style="padding:10px 25px; font-size:16px;">Simpan Data</button>
            <a href="<?=site_url('admin/dashboard')?>" class="btn btn-bahaya" style="padding:10px 25px; font-size:16px; margin-left:10px;">Batal</a>
        </div>
    </form>
</div>