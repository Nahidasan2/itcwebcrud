<?php
include_once('koneksi.php');

if(isset($_POST['addtiket'])){
    $username = mysqli_real_escape_string($conn, $_POST['namapengguna']);
    $nomortelepon = mysqli_real_escape_string($conn, $_POST['nomortelepon']);
    $jabatan = mysqli_real_escape_string($conn, $_POST['jabatan']);
    $katagori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $gambar_dir = "../asset/image/fotosementara/";
    $gambar = $gambar_dir . basename($_FILES['gambar']['name']);
    $imageFileType = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));

    if(move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar)){

        $Qtiket = "INSERT INTO permintaan (username, nomortelepon, jabatan, kategori, subject, gambar, deskripsi) VALUES ('$username', '$nomortelepon', '$jabatan', '$katagori', '$subject', '$gambar', '$deskripsi')";
        $Rtiket = mysqli_query($conn, $Qtiket);
        
        if($Rtiket){
            echo "<script>
            alert('Permintaan Anda Sudah Masuk, Silahkan Ditunggu');
            window.location.href = '../iflogin/dashboard.php';
            </script>";
        }else{
            echo "<script>
            alert('Sepertinya Ada Yang Salah');
            window.location.href = '../iflogin/ticket.php';
            </script>";
        }
    }
}

?>