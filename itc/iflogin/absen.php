<?php
session_start();
include('../asset/navbar.php');
include_once('../asset/koneksi.php');

// tendang manusia yang berani masuk tanpa login
if(!isset($_SESSION['id'])){
    echo "<script>
            window.location.href = '../index.php';
        </script>";
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $Qabsen = "SELECT * FROM users WHERE id='$id'";
    $Rabsen = mysqli_query($conn, $Qabsen);

    if(mysqli_num_rows($Rabsen) == 1){
        $data = mysqli_fetch_assoc($Rabsen);
        $username = $data['username'];
        $kelas = $data['kelas'];
        $jurusanabsen = $data['jurusan'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h1 {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #555;
        }

        .form-check-label {
            color: #555;
            font-size: 16px;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px;
            border: 1px solid #ccc;
        }

        .form-check-input {
            margin-top: 8px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #4e73df;
            border-color: #4e73df;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border-radius: 8px;
        }

        .btn:hover {
            background-color: #3b5bb5;
            border-color: #3b5bb5;
        }

        .form-check {
            margin-bottom: 15px;
        }

        .form-chettk {
            margin-top: 20px;
        }

        .button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
    <a href="dashboard.php"><i class="bi bi-box-arrow-left fs-4" style="color: black;"></i></a>
        <h1>Absensi</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama :</label>
                <input type="text" class="form-control" value="<?php echo $username ?>" readonly>
            </div>

            <!-- <div>
                <label class="form-label" for="kelas">Kelas :</label>
                <input class="form-control" type="text" name="kelas" value="<?php echo $kelas ?>" readonly>
            </div> -->

            <div class="mb-3">
                <label for="absen" class="form-label">Keterangan :</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="absen" value="hadir" id="hadir" required>
                    <label class="form-check-label" for="absen">Hadir</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="absen" value="tidakhadir" id="tidakhadir" required>
                    <label class="form-check-label" for="absen">Tidak Hadir</label>
                </div>
            </div>

            <div>
                <label for="alasan">Alasan (Jika Tidak Hadir) :</label>
                <textarea name="alasan" class="form-control"></textarea>
            </div>

            <div class="form-chettk mb-3">
                <label for="gambar" class="form-label">Masukkan foto anda <q>disekolah</q> :</label>
                <p style="font-size: 11px; color: red;">*jika tidak hadir uploud saja foto random (masih early access)</p>
                <input type="file" name="gambar" class="form-control" id="gambar" required>
            </div>

            <div class="button">
                <button type="submit" class="btn" name="submit">Submit</button>
            </div>
        </form>
    </div>

    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $username;
    $alasan = mysqli_real_escape_string($conn, $_POST['alasan']);
    $absen = $_POST['absen'];
    $gambar_dir = "../asset/image/fotosementara/";
    $gambar = $gambar_dir . basename($_FILES['gambar']['name']);
    $imageFileType = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));

    if(move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar)){
        
        $Qabsen1 = "INSERT INTO absensi (username, keterangan, foto, alasantidakhadir) VALUES ('$username', '$absen', '$gambar', '$alasan')";
        $Rabsen1 = mysqli_query($conn, $Qabsen1);

        if($Rabsen1){
            echo "
            <script>
                alert('Berhasil');
                location.href = 'dashboard.php';
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Gagal, Coba lagi');
                location.href = 'absen.php';
            </script>
            ";
        }

    }

}
?>