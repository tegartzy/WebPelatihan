<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_option = $_POST['option'];

    if ($selected_option == 'a') {
        header("Location: identitas_responden.php");
        exit();
    } elseif ($selected_option == 'b') {
        header("Location: identitas_tamatan.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pilihan</title>
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
            display: flex;
            flex-direction: column;
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

        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 0;
            background-color: #fff;
            color: #000;
        }

        select:focus {
            outline: none;
            border: 2px solid #e81a1a;
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

        .form-group label {
            width: 100%;
        }

        .form-group input, .form-group select {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Form Pilihan</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="option">Pilih Opsi:</label>
                <select name="option" id="option">
                    <option value="a">Pilihan A</option>
                    <option value="b">Pilihan B</option>
                </select>
            </div>
            <div class="button-container">
            <button type="button">Back</button>
            <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Next</button>
        </div>
        </form>
    </div>
</body>
</html>
