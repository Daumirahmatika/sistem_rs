<!DOCTYPE html>
<html>
<head>
    <title>Panel Administrator</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f0f4f8;
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* ===== MENU SAMPING KIRI ===== */
        .sidebar {
            width: 220px;
            background-color: #2c3e50;
            color: white;
            padding: 20px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }
        .sidebar h3 {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            transition: 0.3s;
            font-size: 15px;
        }
        .sidebar a:hover {
            background-color: #34495e;
        }
        .sidebar a.active {
            background-color: #007bff;
        }

        /* ===== KONTEN UTAMA - LEBAR PENUH ===== */
        .main-content {
            margin-left: 220px; /* Sesuai lebar menu kiri */
            flex: 1;
            padding: 25px;
            width: 100%;
            min-height: 100vh;
        }

        .judul {
            font-size: 22px;
            color: #2c3e50;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #007bff;
        }

        .kotak {
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        table th {
            background-color: #f8f9fa;
            color: #2c3e50;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            color: white;
            text-decoration: none;
            font-size: 13px;
            margin: 2px;
            display: inline-block;
        }
        .btn-sukses { background: #28a745; }
        .btn-info  { background: #17a2b8; }
        .btn-bahaya{ background: #dc3545; }
        .btn-biru  { background: #007bff; }
    </style>
</head>
<body>

<!-- Menu Samping -->
<div class="sidebar">
    <h3>🔐 AREA ADMINISTRATOR</h3>
    <a href="<?=site_url('admin/dashboard')?>">🏠 Dashboard Utama</a>
    <a href="<?=site_url('admin/dashboard')?>">👥 Kelola Data Pasien</a>
    <a href="<?=site_url('admin/dokter')?>">👨‍⚕️ Kelola Data Dokter</a>
    <a href="<?=site_url('admin/laporan')?>">📄 Laporan Data Pasien</a>
    <a href="<?=site_url('login/logout')?>" style="margin-top: 30px; background: rgba(220, 53, 69, 0.2);">🚪 Keluar / Logout</a>
</div>

<!-- Konten Utama -->
<div class="main-content">