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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="d-flex justify-content-center- align-items-center mt-5">
        <div class="container text-center">
            <form action="../asset/prosesaddtiket.php" method="POST" class="col-md-20 mx-auto p-4 border rounded shadow bg-white" enctype="multipart/form-data">
                <h1>Add Ticket</h1>
                <div>
                    <input type="text" name="namapengguna" placeholder="Nama Lengkap Anda :" class="form-control" autocomplete="off" autofocus required>
                </div>
                <div class="mt-2">
                    <input type="text" name="nomortelepon" placeholder="Nomor Telepon Anda :" class="form-control" required>
                </div>
                <div class="mt-2">
                <label for="jabatan" name="jabatan" class="form-label text-start d-block ms-2">Status Anda :</label>
                <select name="jabatan" class="form-select" required>
                    <option value="">None</option>
                    <option value="guru">Guru</option>
                    <option value="murid">Murid</option>
                </select>
                </div>
                <div class="mt-2">
                    <label for="katagori" name="katagori" class="form-label text-start d-block ms-2">Katagori :</label>
                    <select name="kategori" class="form-select" required>
                        <option value="">None</option>
                        <option value="hardware">Hardware</option>
                        <option value="software">Software</option>
                        <option value="jaringan">Jaringan</option>
                    </select>
                </div>
                <div>
                    <input type="text" name="subject" placeholder="Subject :" class="form-control mt-2" required>
                </div>
                <div>
                    <label for="gambar" class="form-label text-start d-block ms-2">Gambar :</label>
                    <input class="form-control" type="file" name="gambar">
                </div>
                <div class="form-floating mt-2">
                    <textarea class="form-control" placeholder="Leave a comment here" name="deskripsi" id="floatingTextarea2" style="height: 100px" required></textarea>
                    <label for="floatingTextarea2">Deskripsi :</label>
                </div>
                <div class="text-end w-100">
                    <a href="dashboard.php" class="btn btn-primary mt-2">Back</a>
                    <input type="submit" name="addtiket" value="Add" class=" btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>
    <script src="asset/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>