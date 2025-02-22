<?php
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Pengguna';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <a class="navbar-brand">IT Comunity</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php"><i class="bi bi-houses"></i>Home</a>
        </li>
        <a class="nav-link" href="absen.php"><i class="bi bi-person-bounding-box"></i>Absensi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="allabsen.php"><i class="bi bi-person-vcard"></i> Data Absen</a>
      </li>
      <li class="nav-item">
        <p class="nav-link"><i class="bi bi-person-circle"></i> <?php echo $username ?></p>
      </li>
      <li>
        <li class="nav-item">
          <a class="nav-link" href="../asset/logout.php">LogOut</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
