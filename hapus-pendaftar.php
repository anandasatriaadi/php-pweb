<?php

include("config.php");

if( isset($_GET['id']) ){
    $id = $_GET['id'];

    /* ======== QUERY :: HAPUS DATA PENDAFTAR DENGAN ID $id ======== */
    $sql = "DELETE FROM pendaftar WHERE id=$id";
    $query = mysqli_query($db, $sql);

    if( $query ){
        header('Location: daftar-pendaftar.php');
    } else {
        die("Gagal Menghapus Data Pendaftar");
    }

} else {
    die("ACCESS DENIED");
}

?>