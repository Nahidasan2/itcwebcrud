<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylea.css" media="screen" title="no title">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Login</title>
</head>

<body>
    <div class="input">
        <h1>LOGIN</h1>
        <form action="proseslogin.php" method="POST">
            <div class="box-input">
                <i class="fas fa-envelope-open-text"></i>
                <input type="text" name="username" placeholder="username" autocomplete="off" autofocus required>
            </div>
            <div class="box-input">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" autocomplete="off" required>
            </div>
                <input type="submit" name="login" value="Login" class="btn-input">
            <div class="bottom">
                <p>Belum punya akun?
                    <a href="register.php">Register disini</a>
                </p>
            </div>
        </form>
    </div>
</body>

</html>
