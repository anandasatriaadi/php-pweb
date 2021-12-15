<?php
include("./config.php");

if( !isset($_GET['id']) ){
    header('Location: /tugas-10/daftar-pendaftar.php');
}

/* ======== INISIALISASI VARIABEL ======== */
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM pendaftar_image WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);
/* ======== INISIALISASI VARIABEL PENDAFTAR ======== */
$nama = $siswa['nama'];
$alamat = $siswa['alamat'];
$jk = $siswa['jenis_kelamin'];
$agama = $siswa['agama'];
$sekolah = $siswa['sekolah_asal'];
$foto = $siswa['foto'];

if( mysqli_num_rows($query) < 1 ){
    die("Data tidak ditemukan");
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Formulir Edit Pendaftar | Putu Ananda Satria Adi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pweb.annd.dev/tugas-07/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="gradient">
    <div class="container card" style="padding: 2rem; border: none;">
        <header>
            <h3 class="text-center font-weight-bold my-4">Formulir Edit Siswa</h3>
        </header>

        <form action="/tugas-10/edit-pendaftar.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

            <div class="form-group">
                <label for="nama">Nama: </label>
                <input type="text" class="form-control" name="nama" placeholder="Nama lengkap" value="<?php echo $nama ?>"/>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat: </label>
                <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $alamat ?>"/>
            </div>
            <fieldset class="form-group">
                <legend class="col-form-label">Jenis Kelamin</legend>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="laki" name="jenis_kelamin" value="laki-laki" <?php echo ($jk === 'laki-laki') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="laki">
                        Laki laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="perempuan" name="jenis_kelamin" value="perempuan" <?php echo ($jk === 'perempuan') ? 'checked' : '' ?>> 
                    <label class="form-check-label" for="perempuan">
                        Perempuan
                    </label>
                </div>
            </fieldset>
            <div class="mb-3">
                <label for="foto" class="form-label">Pas foto</label>
                <input class="form-control" type="file" name="foto" id="foto" accept=".png, .jpg, .jpeg" content="<?php echo $foto ?>">
                <img src="<?php echo "./images/".$foto;?>" style="max-height: 300px; width: auto; display: block; margin: 1rem auto 0; border-radius: 2rem" id="previewImg">
            </div>
            <div class="form-group">
                <label for="agama">Agama: </label>
                <select class="form-control" name="agama">
                    <option <?php echo ($agama == 'Islam') ? "selected": "" ?>>Islam</option>
                    <option <?php echo ($agama == 'Kristen') ? "selected": "" ?>>Kristen</option>
                    <option <?php echo ($agama == 'Katolik') ? "selected": "" ?>>Katolik</option>
                    <option <?php echo ($agama == 'Hindu') ? "selected": "" ?>>Hindu</option>
                    <option <?php echo ($agama == 'Budha') ? "selected": "" ?>>Budha</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sekolah_asal">Sekolah Asal: </label>
                <input type="text" class="form-control" name="sekolah_asal" placeholder="Asal sekolah" value="<?php echo $sekolah ?>"/>
            </div>
            <div class="form-group">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Simpan" name="simpan" />
            </div>
        </form>
    </div>

    <script>
        $('#foto').change(function(e) {
            if (e.target.files && e.target.files[0]) {
                let reader = new FileReader();

                reader.onload = function(e) {
                    $('#previewImg').addClass('mt-3');
                    $('#previewImg').attr('src', e.target.result);
                }

                reader.readAsDataURL(e.target.files[0]); // convert to base64 string
            }
        });
    </script>
</body>
</html>