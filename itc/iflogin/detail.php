<?php
session_start();
include_once('../asset/navbar.php');
include_once('../asset/koneksi.php');

// tendang manusia yang berani masuk tanpa login
if(!isset($_SESSION['id'])){
    echo "<script>
            window.location.href = '../index.php';
        </script>";
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $QDetail = "SELECT * FROM permintaan WHERE id='$id'";
    $RDetail = mysqli_query($conn, $QDetail);

    if(mysqli_num_rows($RDetail) == 1){
        $data = mysqli_fetch_assoc($RDetail);
        $username = $data['username'];
        $nomortelepon = $data['nomortelepon'];
        $jabatan = $data['jabatan'];
        $katagori = $data['kategori'];
        $subject = $data['SUBJECT'];
        $gambar = $data['gambar'];
        $deskripsi = $data['deskripsi'];
        $status = $data['STATUS'];
        $pekerja = $data['pekerja'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="d-flex justify-content-center- align-items-center mt-5">
        <div class="container">
            <form action="" method="POST" class="col-md-5 mx-auto p-4 border rounded shadow bg-white">
                <a href="dashboard.php"><i class="bi bi-box-arrow-left fs-4" style="color: black;"></i></a>
                <h1 style="text-align: center;">Detail <?php echo $username ?><i class="bi bi-ticket-detailed"></i></h1>
                <div class="">
                    <label for="username" class="form-label">Nama :</label>
                    <input type="text" name="username" value="<?php echo $username ?>" class="form-control" disabled>
                </div>
                <div>
                    <label for="nomortelepon" class="form-label">Nomor Tlp :</label><br>
                    <input type="text" name="nomortelepon" value="<?php echo $nomortelepon ?>" class="form-control" disabled>
                </div>
                <div>
                    <label for="jabatan" class="form-label">Jabatan :</label><br>
                    <input type="text" name="jabatan" value="<?php echo $jabatan ?>" class="form-control" disabled>
                </div>
                <div>
                    <label for="kategori" class="form-label">Katagori :</label><br>
                    <input type="text" name="kategori" value="<?php echo $katagori ?>" class="form-control" disabled>
                </div>
                <div>
                    <label for="subject" class="form-label">Subject :</label><br>
                    <input type="text" name="subject" value="<?php echo $subject ?>" class="form-control" disabled>
                </div>
                <div>
                    <label for="gambar" class="form-label">Gambar :</label><br>
                    <img src="<?php echo $gambar ?>" alt="" style="width: 200px;">
                </div>
                <div>
                    <label for="deskripsi" class="form-label">Deskripsi :</label><br>
                    <textarea name="deskripsi" class="form-control" disabled><?php echo $deskripsi ?></textarea>
                </div>
                <div>
                    <label for="status" class="form-label">Status :</label>
                    <select name="status" id="" class="form-select">
                        <option value="waiting" <?php echo ($status == 'waiting') ? 'selected' : ''; ?>>Waiting</option>
                        <option value="dikerjakan" <?php echo ($status == 'dikerjakan') ? 'selected' : ''; ?>>Dikerjakan</option>
                        <option value="selesai" <?php echo ($status == 'selesai') ? 'selected' : ''; ?>>Selesai</option>
                    </select>
                </div>  
                <div>
                    <label for="namapekerja" class="form-label">Nama Pekerja/penerima :</label>
                    <input type="text" name="namapekerja" placeholder="Tulis Namamu Disini Budak!" class="form-control" value="<?php echo $pekerja ?>" required>
                </div>
                <div>
                    <input type="submit" name="updatestatus" value="Update" class="form-control btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>

    <script src="asset/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php

if(isset($_POST['updatestatus'])){
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $namapekerja = mysqli_real_escape_string($conn, $_POST['namapekerja']);

    $Qupdatestatus = "UPDATE permintaan SET STATUS='$status', pekerja='$namapekerja'";
    $Rupdatestatus = mysqli_query($conn, $Qupdatestatus);

    if($Rupdatestatus){
        echo "
        <script>
        alert('Data Sudah DiUpdate');
        location.href = 'dashboard.php';
        </script>
        ";
    }else{
        echo "
        <script>
        alert('Gagal');
        location.href = 'detail.php';
        </script>
        ";
    }
}

?>