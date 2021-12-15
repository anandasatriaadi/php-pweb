<?php

include("./config.php");

if(isset($_POST['simpan'])){
    $id = str_replace("'", "\'", $_POST['id']);
    $nama = str_replace("'", "\'", $_POST['nama']);
    $alamat = str_replace("'", "\'", $_POST['alamat']);
    $jenis_kelamin = str_replace("'", "\'", $_POST['jenis_kelamin']);
    $agama = str_replace("'", "\'", $_POST['agama']);
    $sekolah_asal = str_replace("'", "\'", $_POST['sekolah_asal']);
    $foto = "";
    
    if(!empty($_FILES['foto']['name'])){
        if($_FILES['foto']['size'] > 2*1048576) {
            die(json_encode([
                "error" => 500,
                "status" => "File too large (> 2 MB)"
            ]));
            exit;
        }
        
        $filename = $_FILES['foto']['name'];
        
        $location = "./images/".$filename;
        $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
        $imageFileType = strtolower($imageFileType);
        $imageNewFileName = md5(time()).'.'.$imageFileType;
        $location = "./images/".$imageNewFileName;

        $valid_extensions = array("jpg","jpeg","png");
     
        $response = 0;
        /* Check file extension */
        if(in_array(strtolower($imageFileType), $valid_extensions)) {
           /* Upload file */
           if(move_uploaded_file($_FILES['foto']['tmp_name'],$location)){
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
        
        $sql = "SELECT * FROM pendaftar_image WHERE id=$id";
        $query = mysqli_query($db, $sql);

        $old_foto = "";
        while ($siswa = mysqli_fetch_array($query)) {
            $old_foto = $siswa["foto"];
            break;
        }
        
        if($old_foto && file_exists($old_foto)){
            unlink($old_foto);
        }

        $sql = "UPDATE pendaftar_image
                SET nama='$nama', jenis_kelamin='$jenis_kelamin', agama='$agama', sekolah_asal='$sekolah_asal', alamat='$alamat', foto='$foto'
                WHERE id=$id";
    } else {
        $sql = "UPDATE pendaftar_image
                SET nama='$nama', jenis_kelamin='$jenis_kelamin', agama='$agama', sekolah_asal='$sekolah_asal', alamat='$alamat'
                WHERE id=$id";
    }

    $query = mysqli_query($db, $sql);
    
    if ($query) {
        header('Location: /tugas-10/daftar-pendaftar.php');
    } else {
        die("Gagal menyimpan perubahan...");
    }
}else{
    die("Method not allowed");
}