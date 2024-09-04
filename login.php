<?php

session_start();
include 'config\database.php';



if(isset($_POST['login'])) {
        $username = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
}


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare a statement to retrieve the user data
    $stmt = $db->prepare("SELECT * FROM akun WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user_data = $result->fetch_assoc();

        // Verify the password using a secure password hashing algorithm
        if (password_verify($password, $user_data['password'])) {
            // Initialize the session
            $_SESSION['login'] = true;
            $_SESSION['id_akun'] = $user_data['id_akun'];
            $_SESSION['email'] = $user_data['email'];

            // Redirect to the main page
            header("Location: jenisResponden.php");
            exit;
        } else {
            $error = true;
        }
    } else {
        $error = true;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Laporan</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

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
        }

        .form-left {
            margin-left: 100px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.7);
        }

        .text {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-image {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            object-fit: cover;
        }

        .form-right {
            display: flex;
            flex-direction: column;
            margin-left: 100px;
            justify-content: end;
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

        .form-group .input-icon2 {
            position: absolute;
            left: 15px;
            top: 50%;
            bottom: 100px;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 18px;
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

        .alert {
            margin-top: 20px;

            /* Ukuran layar besar */
            @media (min-width: 1200px) {
                .form-box {
                    width: 50%;
                    margin: 0 auto;
                }
            }

            /* Ukuran layar sedang */
            @media (max-width: 992px) {
                .form-box {
                    width: 70%;
                    margin: 0 auto;
                }
            }

            /* Ukuran layar kecil */
            @media (max-width: 768px) {
                .form-box {
                    width: 90%;
                    margin: 0 auto;
                }

                .form-left {
                    display: none;
                }

                .form-right {
                    width: 100%;
                }
            }

            /* Ukuran layar sangat kecil */
            @media (max-width: 480px) {
                .form-box {
                    width: 100%;
                    margin: 0 auto;
                }

                .form-right {
                    padding: 20px;
                }
            }
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

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <form class="form-box" action="" method="POST">
            <div class="form-left">
                <img src="assets\img\219986.png" alt="Deskripsi Gambar" class="form-image">
            </div>
            <div class="form-right">
                <div class="form-group">
                    <h3 class="text">User Login</h3>
                    <label for="email"></label>
                    
                        <span class="input-icon1"><i class="fa-solid fa-envelope"></i></span>
                    
                    <input type="email" id="email" name="email" placeholder="Email Id" required>
                </div>
                <div class="form-group">
                    <label for="password"></label>
                    <span class="input-icon2"><i class="fas fa-lock"></i></span>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger">
                            <b>Email atau password salah. Silakan coba lagi.</b>
                        </div>
                    <?php endif; ?>

                </div>
                <h6>forgot your <a href="lupaPassword.php">password</a>?</h6>
                <button name="login" type="submit">Login</button>

            </div>


        </form>
    </div>
</body>

</html>