<?php
include 'config/app.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_responden = $_POST['nama_responden'];
    $jabatan_responden = $_POST['jabatan_responden'];
    $nama_sekolah = $_POST['nama_sekolah'];
    $kabupaten_kota = $_POST['kabupaten_kota'];

 
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    if (tambahidentitas($_POST) > 0) {
        // Redirect ke halaman lain
        header('Location: rekam.php');
        exit;
    } else {
        echo "<script>
                alert('Data gagal ditambahkan');
              </script>";
    }
}


?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Responden</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFD7BE;
            margin: 0;
            padding: 20px;
        }

        .card {
            max-width: 870px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        h2 {
            background-color: #e81a1a;
            color: white;
            padding: 20px;
            text-align: center;
            margin: -20px -20px 20px -20px;
            border-radius: 8px 8px 0 0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"], input[list] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: none;
            border-bottom: 1px solid #ccc;
            background-color: #fff;
            color: #000;
            border-radius: 0;
        }

        input[type="text"]:focus, input[list]:focus {
            outline: none;
            border-bottom: 2px solid #e81a1a;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #ccc;
            border-radius: 0;
            height: 38px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .button-container button {
            width: 100px;
            height: 30px;
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            background-color: #e81a1a;
            color: white;
        }

        .button-container button:hover {
            background-color: #45a049;
        }

        .required-message {
            color: red;
            font-size: 12px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            width: 100%;
        }

        .form-group input, .form-group select {
            width: 100%;
        }
    </style>
</head>
<body>


    <form action="" method="POST">
        <div class="card">
            <h2>IDENTITAS RESPONDEN</h2>

            <div class="form-group">
                <label for="nama_responden">Nama Responden *</label>
                <input type="text" id="nama_responden" name="nama_responden" required>
                <p class="required-message">This is a required question</p>
            </div>
        </div>

        <div class="card">
            <div class="form-group">
                <label for="jabatan_responden">Jabatan Responden *</label>
                <select class="select2" name="jabatan_responden" id="jabatan_responden" required>
                    <option value="">Pilih Jabatan</option>
                    <option value="Guru"<?= isset($jabatan_responden) && $jabatan_responden == 'Guru' ? 'selected' : '' ?>>Guru</option>
                    <option value="KepalaSekolah"<?= isset($jabatan_responden) && $jabatan_responden == 'KepalaSekolah' ? 'selected' : '' ?>>Kepala Sekolah</option>
                    <option value="WakilKepSek"<?= isset($jabatan_responden) && $jabatan_responden == 'WakilKepSek' ? 'selected' : '' ?>>Wakil Kepala Sekolah</option>
                </select>
                <p class="required-message">This is a required question</p>
            </div>
        </div>
        
        <div class="card">
            <div class="form-group">
                <label for="nama_sekolah">Nama Institusi/Sekolah *</label>
                <select class="select2" name="nama_sekolah" id="nama_sekolah" required>
                    <option value="">Pilih Sekolah</option>
                    <option value="SMA 1 Jakarta"<?= isset($nama_sekolah) && $nama_sekolah == 'SMA 1 Jakarta' ? 'selected' : '' ?>>SMA 1 Jakarta</option>
                    <option value="SMA 2 Bandung"<?= isset($nama_sekolah) && $nama_sekolah == 'SMA 2 Bandung' ? 'selected' : '' ?>>SMA 2 Bandung</option>
                    <option value="SMA 3 Surabaya"<?= isset($nama_sekolah) && $nama_sekolah == 'SMA 3 Surabaya' ? 'selected' : '' ?>>SMA 3 Surabaya</option>
                </select>
                <p class="required-message">This is a required question</p>
            </div>
        </div>

        <div class="card">
            <div class="form-group">
                <label for="kabupaten_kota">Kabupaten/Kota *</label>
                <select class="select2" name="kabupaten_kota" id="kabupaten_kota" required>
                    <option value="">Pilih Kabupaten/Kota</option>
                    <option value="Jakarta"<?= isset($kabupaten_kota) && $kabupaten_kota == 'Jakarta' ? 'selected' : '' ?>>Jakarta</option>
                    <option value="Bandung"<?= isset($kabupaten_kota) && $kabupaten_kota == 'Bandung' ? 'selected' : '' ?>>Bandung</option>
                    <option value="Surabaya"<?= isset($kabupaten_kota) && $kabupaten_kota == 'Surabaya' ? 'selected' : '' ?>>Surabaya</option>
                </select>
                <p class="required-message">This is a required question</p>
            </div>
            </div>

            <div class="card">
            <div class="form-group">
                <label for="no_wa">Nomer WhatsApp *</label>
                <input type="text" id="no_wa" name="no_wa" required>
                <p class="required-message">This is a required question</p>
            </div>
            </div>
            
        
            <div class="card">
            <div class="form-group">
                <label for="email">Alamat Email*</label>
                <input type="text" id="email" name="email" required>
                <p class="required-message">This is a required question</p>
            </div>
            
        
       

        <div class="button-container">
            <button type="button">Back</button>
            <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>
        </div>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select an option",
                allowClear: true
            });
        });
    </script>
</body>
</html>