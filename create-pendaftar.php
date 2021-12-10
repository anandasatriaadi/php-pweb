<?php

include("config.php");

if(isset($_POST['daftar'])){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];

    $sql = "INSERT INTO pendaftar (nama, alamat, jenis_kelamin, agama, sekolah_asal) VALUE ('$nama', '$alamat', '$jk', '$agama', '$sekolah')";
    $query = mysqli_query($db, $sql);

    /* ======== Apakah Query Berhasil ======== */
    if( $query ) {
        /* ======== Redirect ke halaman index.php dengan status sukses ======== */
        header('Location: index.php?status=sukses');
    } else {
        /* ======== Redirect ke halaman index.php dengan status gagal ======== */
        header('Location: index.php?status=gagal');
    }

} else {
    die("ACCESS DENIED");
}

?>