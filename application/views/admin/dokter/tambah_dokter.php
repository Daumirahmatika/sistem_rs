<h2 style="margin-bottom:20px; color:#2c3e50;">➕ Tambah Data Dokter</h2>

<div style="background:#ffffff; padding:25px; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.1); max-width:500px;">
    <form method="post" action="<?=site_url('admin/simpan_dokter')?>">
        
        <div class="form-group" style="margin-bottom:15px;">
            <label style="display:block; margin-bottom:5px; font-weight:500;">Nama Lengkap Dokter</label>
            <input type="text" name="nama_dokter" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;">
        </div>

        <div class="form-group" style="margin-bottom:15px;">
            <label style="display:block; margin-bottom:5px; font-weight:500;">Spesialis / Bidang Keahlian</label>
            <input type="text" name="spesialis" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;" placeholder="Contoh: Penyakit Dalam, Gigi, Kandungan">
        </div>

        <div class="form-group" style="margin-bottom:20px;">
            <label style="display:block; margin-bottom:5px; font-weight:500;">Jadwal Praktek</label>
            <textarea name="jadwal_praktek" class="form-control" rows="3" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px;" placeholder="Contoh: Senin - Jumat (08:00 - 14:00)"></textarea>
        </div>

        <div style="text-align:center;">
            <button type="submit" class="btn" style="background:#28a745; color:white; padding:10px 25px; border-radius:6px; border:none; font-size:15px; cursor:pointer;">Simpan Data</button>
            <a href="<?=site_url('admin/dokter')?>" class="btn" style="background:#6c757d; color:white; padding:10px 25px; border-radius:6px; text-decoration:none; margin-left:8px;">Batal</a>
        </div>

    </form>
</div>