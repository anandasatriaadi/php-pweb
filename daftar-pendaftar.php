<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Daftar Siswa Pendaftar | Putu Ananda Satria Adi</title>
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
            <h2 class="text-center font-weight-bold my-4">Daftar Siswa Pendaftar</h2>
        </header>

        <nav class="text-center mb-4">
            <a class="btn btn-primary" href="form-daftar.php">+ Tambah Baru</a>
        </nav>

        <br>

        <table class="table table-striped" style="background-color: rgba(255, 255, 255, 0.5)">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Sekolah Asal</th>
                    <th scope="col" style="display: flex; justify-content: center;">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM pendaftar";
                $query = mysqli_query($db, $sql);
                while($siswa = mysqli_fetch_array($query)){
                    echo "<tr>";
                    echo "<td>".$siswa['id']."</td>";
                    echo "<td>".$siswa['nama']."</td>";
                    echo "<td>".$siswa['alamat']."</td>";
                    echo "<td>".$siswa['jenis_kelamin']."</td>";
                    echo "<td>".$siswa['agama']."</td>";
                    echo "<td>".$siswa['sekolah_asal']."</td>";
                    echo "<td style='display: flex; justify-content: center;'>";
                    echo "<a class='btn btn-warning' style='margin-right: 1rem' href='form-edit.php?id=".$siswa['id']."'>Edit</a>";
                    echo "<a class='btn btn-danger' href='hapus-pendaftar.php?id=".$siswa['id']."'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <p>Total: <?php echo mysqli_num_rows($query) ?></p>
    </div>
</body>
</html>