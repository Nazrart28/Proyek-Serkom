<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Mitra</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 25px rgba(0, 0, 205, 0.3);
        }

        .container h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            color: #555;
        }

        .form-group input[type="text"],
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        .form-group input[type="text"]:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #007bff;
        }

        .form-group input[type="submit"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Data Mitra</h1>
        <form action="<?= site_url('user/submit') ?>" method="post">
            <div class="form-group">
                <label for="name">Nama Instansi:</label>
                <input type="text" id="instansi" name="instansi" placeholder="Masukkan nama instansi">
            </div>

            <div class="form-group">
                <label for="name">Nama Pimpinan:</label>
                <input type="text" id="pimpinan" name="pimpinan" placeholder="Masukkan nama pimpinan">
            </div>

            <div class="form-group">
                <label for="name">Nama Mentor:</label>
                <input type="text" id="mentor" name="mentor" placeholder="Masukkan nama mentor">
            </div>

            <div class="form-group">
                <label for="address">Alamat:</label>
                <textarea id="alamat" name="alamat" placeholder="Masukkan alamat"></textarea>
            </div>

            <div class="form-group">
                <label for="phone">No Telp:</label>
                <input type="text" id="telp" name="telp" placeholder="Masukkan no telp">
            </div>

            <div class="form-group">
                <label for="name">Nama Proyek:</label>
                <input type="text" id="proyek" name="proyek" placeholder="Masukkan nama proyek">
            </div>

            <div class="form-group">
                <label for="address">Deskripsi Proyek:</label>
                <textarea id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi proyek"></textarea>
            </div>

            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>

</html>

<?= $this->endSection(); ?>