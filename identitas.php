<?php
session_start();
if (!isset($_SESSION["login"]) || empty($_SESSION["login"])) {
    header('Location: login.php');
    exit;
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
    </style>
</head>
<body>
    <form action="form_responden.php" method="POST">
        <div class="card">
            <h2>IDENTITAS RESPONDEN</h2>

            <div class="form-group">
                <label for="jabatan_responden">Jabatan Responden *</label>
                <select class="select2" name="jabatan_responden" id="jabatan_responden" required>
                    <option value="">Pilih Jabatan</option>
                    <option value="Guru">Guru</option>
                    <option value="Kepala Sekolah">Kepala Sekolah</option>
                    <option value="Wakil Kepala Sekolah">Wakil Kepala Sekolah</option>
                </select>
                <p class="required-message">This is a required question</p>
            </div>
        </div>

        <div class="card">
            <div class="form-group">
                <label for="nama_sekolah">Nama Institusi/Sekolah *</label>
                <select class="select2" name="nama_sekolah" id="nama_sekolah" required>
                    <option value="">Pilih Sekolah</option>
                    <option value="SMA 1 Jakarta">SMA 1 Jakarta</option>
                    <option value="SMA 2 Bandung">SMA 2 Bandung</option>
                    <option value="SMA 3 Surabaya">SMA 3 Surabaya</option>
                </select>
                <p class="required-message">This is a required question</p>
            </div>
        </div>

        <div class="button-container">
            <button type="button">Back</button>
            <button type="submit">Next</button>
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

    <a href="logout.php">logout</a>
</body>
</html>