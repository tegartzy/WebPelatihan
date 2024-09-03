<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
        }

        .form-box {
            width: 900px;
            height: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .text {
            text-align: center;

        }

        .form-group {
            margin-bottom: 15px;
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 10px 12px 10px 40px;
            border-radius: 50px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
        }

        button {
            padding: 10px;
            border: none;
            border-radius: 50px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .form-group .input-icon1 {
            position: absolute;
            left: 15px;
            top: 75%;
            bottom: 200px;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form class="form-box" action="resetToken.php" method="post">
            <div class="form-right">
                <div class="form-group">
                    <span class="input-icon1"><i class="fa-solid fa-envelope"></i></span>
                    <h2 class="text">Masukan Email</h2>
                    <label for="email"></label>
                    
                    <input type="email" id="email" name="email" placeholder="Email Id" required>
                </div>
                <div>
                    <button name="login" type="submit">Kirim</button>
                </div>
</body>

</html>