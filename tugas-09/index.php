<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Siswa Baru | Putu Ananda Satria Adi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pweb.annd.dev/tugas-07/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">
		.main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100%;
        }
        .message {
            padding: 1rem;
            color: white;
            text-align: center;
            border-radius: 0.3rem;
            font-size: 1.25rem;
        }

        .message.bg-success {
            background-color: rgba(54, 191, 91, 1) !important
        }

        .message.bg-danger {
            background-color: rgba(222, 62, 75, 1) !important
        }
	</style>
</head>
<body class="gradient">
	<div class="main-container">
        <div class="card" style="padding: 2rem; border: none;">
            <h3>Pendaftaran Siswa SD Joh Kaja</h3>
            <hr>
            <a class="btn btn-primary btn-lg btn-block" href="/tugas-09/form-daftar.php">Daftar Sebagai Siswa</a>
            <a class="btn btn-primary btn-lg btn-block" href="/tugas-09/daftar-pendaftar.php">Daftar Siswa Pendaftar</a>
            <?php if(isset($_GET['status'])): ?>
            <?php
                if($_GET['status'] == 'sukses'){
                    echo "<p class='message bg-success mt-5'>Pendaftaran siswa baru berhasil!</p>";
                } else {
                    echo "<p class='message bg-danger mt-5'>Pendaftaran gagal!</p>";
                }
            endif;
            ?>
        </div>
	</div>
    <div style="height: 200px"></div>
</body>
</html>