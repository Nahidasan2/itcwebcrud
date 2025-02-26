<?php
session_start();
include_once('../asset/koneksi.php');
include('../asset/navbar.php');

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .judul{
            text-align: center;
        }
    </style>
</head>
<body>
<h1 class="judul">Member</h1>
<div class="row">
    <?php
        $Qmember = "SELECT * FROM users";
        $Rmember = mysqli_query($conn, $Qmember);

        while($member = mysqli_fetch_array($Rmember)){

    ?>
    <div class="card ms-5" style="width: 12rem;">
        <img src="../asset/image/ayame.png" class="card-img-top" alt="">
        <div class="card-body" style="text-align: center;">
            <h5 class="card-title"><?php echo $member['username'] ?></h5>
            <p class="card-text"><?php echo $member['kelas'] . ' ' . $member['jurusan']; ?></p>
        </div>
    </div>
<?php } ?>
</div>
<script src="asset/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>