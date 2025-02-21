<?php
include_once('asset/koneksi.php');

if(isset($_POST['registerbtn'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $kelas = mysqli_real_escape_string($conn, $_POST['kelas']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $kelasitc = mysqli_real_escape_string($conn, $_POST['kelasitc']);
    $jeniskelamin = mysqli_real_escape_string($conn, $_POST['jeniskelamin']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $passwordhash = password_hash($password, PASSWORD_DEFAULT);

    $Qregister = "INSERT INTO users (username, kelas, jurusan, kelasitc, jeniskelamin, password) VALUES ('$username', '$kelas', '$jurusan', '$kelasitc', '$jeniskelamin', '$passwordhash')";
    $Rregister = mysqli_query($conn, $Qregister);

    if($Rregister){
        echo "<script>
        alert('Berhasil Register Silahkan Login!');
        window.location.href = 'index.php';
        </script>";
    }else{
        echo "<script>
        alert('Berhasil Register Silahkan Login!');
        window.location.href = 'index.php';
        </script>";
    }
}

?>