<?php

include("config.php");

if(isset($_POST['simpan'])){
    /* ======== AMBIL DATA DARI POST REQUEST ======== */
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];

    /* ======== QUERY :: UPDATE DATA PENDAFTAR ======== */
    $sql = "UPDATE pendaftar SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    if( $query ) {
        header('Location: daftar-pendaftar.php');
    } else {
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("ACCESS DENIED");
}
?>