<?php

include("./config.php");

if(isset($_POST['daftar'])){
    $nama = str_replace("'", "\'", $_POST['nama']);
    $alamat = str_replace("'", "\'", $_POST['alamat']);
    $jenis_kelamin = str_replace("'", "\'", $_POST['jenis_kelamin']);
    $agama = str_replace("'", "\'", $_POST['agama']);
    $sekolah_asal = str_replace("'", "\'", $_POST['sekolah_asal']);
    $foto = "";

    // var_dump($_FILES);
    // exit();

    if(isset($_FILES['foto']['name'])){

        if($_FILES['foto']['size'] > 2*1048576) {
            die(json_encode([
                "error" => 500,
                "status" => "File is too large (> 2 MB)"
            ]));
            exit;
        }

        /* Getting file name */
        $filename = $_FILES['foto']['name'];
        
        /* Location */
        $location = "./images/".$filename;
        $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
        $imageFileType = strtolower($imageFileType);
        $imageNewFileName = md5(time()).'.'.$imageFileType;
        $location = "./images/".$imageNewFileName;

        /* Valid extensions */
        $valid_extensions = array("jpg","jpeg","png");
     
        $response = 0;
        /* Check file extension */
        if(in_array(strtolower($imageFileType), $valid_extensions)) {
           /* Upload file */
           if(move_uploaded_file($_FILES['foto']['tmp_name'], $location)){
              $response = $location;
              $foto = $imageNewFileName;
           }
        }else{
            die(json_encode([
                "error" => 500,
                "status" => "Invalid file type"
            ]));
            exit;
        }     
    }


    $sql = "INSERT INTO pendaftar_image (nama, jenis_kelamin, agama, sekolah_asal, alamat, foto)
            VALUE ('$nama', '$jenis_kelamin', '$agama', '$sekolah_asal', '$alamat', '$foto')";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: /tugas-10/index.php?status=sukses');
    } else {
        header('Location: /tugas-10/index.php?status=gagal');
    }
}else{
    die("Method not allowed");
}

?>