<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="styleb.css" media="screen" title="no title">
</head>

<body>
    <div class="input">
        <h1>REGISTER</h1>
        <form action="prosesregister.php" method="POST">
            <div class="box-input">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="username" autocomplete="off" required>
            </div>
            <div class="box-input">
                <i class="fas fa-envelope-open-text"></i>
                <input type="text" name="kelas" placeholder="kelas" autocomplete="off" required>
            </div>
            <div class="box-input">
                <i class="fas fa-envelope-open-text"></i>
                <input type="text" name="jurusan" placeholder="jurusan" autocomplete="off" required>
            </div>
            <div class="box-input">
                <i class="fas fa-envelope-open-text"></i>
                <input type="radio" name="kelasitc" placeholder="kelasitc" value="programer" required>PROGAMMER</input>
                <input type="radio" name="kelasitc" placeholder="kelasitc" value="desain" required>DESAIN</input>

            </div>
            <div class="box-input">
                <i class="fas fa-envelope-open-text"></i>
                <input type="radio" name="jeniskelamin" value="laki-laki" required>LAKI-LAKI
                <input type="radio" name="jeniskelamin" value="perempuan" required>PEREMPUAN
            </div>
            <div class="box-input">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="password" required>
            </div>
            <div>
                <div class="btn">
                    <input type="submit" name="registerbtn" class="btn-input">
                </div>
            <div class="bottom">
                <p>Sudah punya akun?
                    <a href="index.php">Login disini</a>
                </p>
            </div>
        </form>

    </div>
</body>