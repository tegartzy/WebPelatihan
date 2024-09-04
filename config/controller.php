

<?php
if (!function_exists('select')) {
    function select($query)
    {
        global $db;

        $result = mysqli_query($db, $query);
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }
}



// fungsi menambahkan data barang
function tambahidentitas($post)
{
    global $db;

    // Sanitize input
    $nama_responden = strip_tags($post['nama_responden']);
    $jabatan_responden = strip_tags($post['jabatan_responden']);
    $nama_sekolah = strip_tags($post['nama_sekolah']);
    $kabupaten_kota = strip_tags($post['kabupaten_kota']);
    $no_wa = strip_tags($post['no_wa']);
    $email = strip_tags($post['email']);

    // Query untuk menambahkan data ke dalam tabel `identitas_responden`
    $query = "INSERT INTO identitas_responden (nama_responden, jabatan_responden, nama_sekolah, kabupaten_kota, no_wa, email) 
              VALUES ('$nama_responden', '$jabatan_responden', '$nama_sekolah', '$kabupaten_kota', '$no_wa', '$email')";

    // Eksekusi query
    mysqli_query($db, $query);

    // Kembalikan jumlah baris yang terpengaruh
    return mysqli_affected_rows($db);
}

