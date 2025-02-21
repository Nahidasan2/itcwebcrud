<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Pengguna';
session_destroy();
echo "<script>
        alert('Sayonara $username, Sampai Bertemu Lagi');
        window.location.href = '../index.php';
    </script>";
exit;
?>