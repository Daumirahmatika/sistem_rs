<h2 class="judul">✏️ Ubah Data Dokter</h2>

<div class="kotak">
    <form method="post" action="<?=site_url('admin/update_dokter/'.$dokter->id_dokter)?>">
        <div class="form-group">
            <label>Nama Lengkap Dokter</label>
            <input type="text" name="nama_dokter" class="form-control" value="<?=$dokter->nama_dokter?>" required>
        </div>
        <div class="form-group">
            <label>Spesialis / Bidang Keahlian</label>
            <input type="text" name="spesialis" class="form-control" value="<?=$dokter->spesialis?>" required>
        </div>
        <div class="form-group">
            <label>Jadwal Praktek</label>
            <textarea name="jadwal_praktek" class="form-control" rows="3" required><?=$dokter->jadwal_praktek?></textarea>
        </div>

        <div style="margin-top:25px; text-align:center;">
            <button type="submit" class="btn" style="background:#007bff; padding:10px 25px; font-size:16px;">Simpan Perubahan</button>
            <a href="<?=site_url('admin/dokter')?>" class="btn" style="background:#6c757d; padding:10px 25px; font-size:16px; margin-left:10px;">Batal</a>
        </div>
    </form>
</div>

<style>
.form-control {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ced4da;
    border-radius: 6px;
    font-size: 14px;
    margin-bottom:15px;
}
.form-group label {
    display: block;
    margin-bottom: 6px;
    font-weight: 500;
    color: #2c3e50;
}
</style>