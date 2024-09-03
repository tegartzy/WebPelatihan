<?php

$email = $_POST["email"];

$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

try {
    $db = require __DIR__ . "/config/database.php";
    $sql = "UPDATE akun 
            SET reset_token = ?,
                reset_token_expired = ?
            WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("sss", $token_hash, $expiry, $email);
    $stmt->execute();

    if ($db->affected_rows) {
        $mail = require __DIR__ . "/mailer.php";
        $mail->setFrom("noreply@example.com");
        $mail->addAddress($email);
        $mail->Subject = "Reset Password";
        $mail->Body = <<<END
        Click <a href="http://example.com/reset-password.php?token=$token">here</a>
        to reset your password.
        END;

        try {
            $mail->send();
            echo "Pesan telah dikirim. Harap periksa email Anda.";
        } catch (Exception $e) {
            echo "Pesan tidak dapat dikirim. Kesalahan: " . $mail->ErrorInfo;
        }
    } else {
        echo "Pengguna tidak ditemukan.";
    }
} catch (Exception $e) {
    echo "Kesalahan: " . $e->getMessage();
}