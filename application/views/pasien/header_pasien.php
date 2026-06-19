<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Pasien - RS Sehat Bersama</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        body {
            background: linear-gradient(rgba(255, 255, 255, 0.75), rgba(240, 247, 255, 0.75)), 
            url('https://images.pexels.com/photos/668298/pexels-photo-668298.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #60a3bc 0%, #3c8dad 100%);
            color: white;
            position: fixed;
            height: 100%;
            padding-top: 25px;
            box-shadow: 4px 0 15px rgba(0,0,0,0.1);
        }

        .sidebar h3 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 18px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            transition: all 0.3s;
        }

        .sidebar a:hover {
            background: rgba(255,255,255,0.15);
            padding-left: 28px;
        }

        .konten {
            margin-left: 250px;
            padding: 30px;
        }

        .judul {
            color: #0a3d62;
            font-size: 24px;
            margin-bottom: 25px;
        }

        .kotak {
            background: rgba(255, 255, 255, 0.92);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(10, 61, 98, 0.18);
            border-left: 4px solid #60a3bc;
            backdrop-filter: blur(4px);
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h3>👤 AREA PASIEN</h3>
        <a href="<?=site_url('pasien/dashboard')?>">🏠 Beranda</a>
        <a href="<?=site_url('login/logout')?>" style="margin-top: 30px; background: rgba(220, 53, 69, 0.2);">🚪 Keluar</a>
    </div>

    <div class="konten">