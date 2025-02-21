<?PHP
session_start();
include_once('asset/koneksi.php');

if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $Qlogin = "SELECT * FROM users WHERE username = '$username'";
    $Rlogin = mysqli_query($conn, $Qlogin);

    if(mysqli_num_rows($Rlogin) > 0){
        $user = mysqli_fetch_assoc($Rlogin);

        if(password_verify($password, $user['PASSWORD'])){
            session_start();

            $_SESSION['username'] = $user['username'];
            $_SESSION['kelas'] = $user['kelas'];
            $_SESSION['id'] = $user['id'];

            $username = $user['username'];
            $kelas = $user['kelas'];
            $jurusan = $user['jurusan'];

            echo "<script>
                alert('Selamat Datang $username, anda adalah kelas $kelas');
                window.location.href = 'iflogin/dashboard.php';
                </script>";
        }else{
            echo "<script>
                alert('Password salah!');
                window.location.href = 'index.php';
                </script>";
        }
    }else{
        echo "<script>
                alert('Sepertinya Username Kamu Salah');
                window.location.href = 'index.php';
                </script>";
    }
}

?>