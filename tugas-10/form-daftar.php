<!DOCTYPE html>
<html>
<head>
	<title>Formulir Pendaftaran Siswa Baru | Putu Ananda Satria Adi</title>
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
            <h3 class="text-center font-weight-bold mb-5">Formulir Pendaftaran Siswa Baru</h3>
        </header>
        <form action="/tugas-10/create-pendaftar.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama: </label>
                <input type="text" class="form-control" name="nama" placeholder="Nama lengkap"/>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat: </label>
                <input type="text" class="form-control" name="alamat" placeholder="Alamat"/>
            </div>
            <fieldset class="form-group">
                <legend class="col-form-label">Jenis Kelamin</legend>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="laki" name="jenis_kelamin" value="laki-laki">
                    <label class="form-check-label" for="laki">
                        Laki laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="perempuan" name="jenis_kelamin" value="perempuan"> 
                    <label class="form-check-label" for="perempuan">
                        Perempuan
                    </label>
                </div>
            </fieldset>
            <div class="mb-3">
                <label for="foto" class="form-label">Pas foto</label>
                <input class="form-control" type="file" name="foto" id="foto" accept=".png, .jpg, .jpeg" required>
                <img src="" style="max-height: 300px; width: auto; display: block; margin: 0 auto; border-radius: 2rem" id="previewImg">
            </div>
            <div class="form-group">
                <label for="agama">Agama: </label>
                <select class="form-control" name="agama">
                    <option>Islam</option>
                    <option>Kristen</option>
                    <option>Katolik</option>
                    <option>Hindu</option>
                    <option>Budha</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sekolah_asal">Sekolah Asal: </label>
                <input type="text" class="form-control" name="sekolah_asal" placeholder="Asal sekolah" />
            </div>
            <div class="form-group">
                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Daftar" name="daftar" />
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