<?php

include("./config.php");

if( isset($_GET['id']) ){
    $id = $_GET['id'];

    /* ======== QUERY :: HAPUS DATA PENDAFTAR DENGAN ID $id ======== */
    $sql = "DELETE FROM pendaftar_image WHERE id=$id";
    $query = mysqli_query($db, $sql);

    if( $query ){
        header('Location: /tugas-10/daftar-pendaftar.php');
    } else {
        die("Gagal Menghapus Data Pendaftar");
    }

} else {
    die("ACCESS DENIED");
}

?>