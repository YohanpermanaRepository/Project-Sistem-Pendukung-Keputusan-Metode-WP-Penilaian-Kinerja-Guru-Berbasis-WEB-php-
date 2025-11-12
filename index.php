<?php
require("controller/Login.php");

session_start();

if (isset($_SESSION['login'])) {
    if ($_SESSION['hak_akses'] === 'guru') {
        header("Location: indexguru.php");
    } else {
        header("Location: page/index.php");
    }
    exit;
}

if (isset($_POST['login'])) {
    $login = Login($_POST);
    if ($login['success']) {
        $_SESSION['login'] = true;
        $_SESSION['hak_akses'] = $login['hak_akses'];
        if ($login['hak_akses'] === 'guru') {
            header("Location: indexguru.php");
        } else {
            header("Location: page/index.php");
        }
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="asset/css/styling.css">
</head>

<body>
    <section class="section" id="section">
        <div class="container">
            <div class="row">
                <div class="columns is-centered">
                    <div class="column is-5">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-header-title">Login</p>
                            </div>
                            <div class="card-content">
                                <?php if (isset($login['error'])) : ?>
                                    <p>
                                        <?= "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Gagal login, periksa kembali username dan password anda!',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        }).then(function() {
            window.location.href = 'index.php';
        });
        </script>"; ?></p>
                                <?php endif ?>
                                <form action="" method="post">
                                    <div class="field">
                                        <label class="label">Username</label>
                                        <span class="icon is-small is-left">
                                            <ion-icon name="person"></ion-icon>
                                        </span>
                                        <div class="control has-icons-left">                                            
                                            <input class="input" type="text" placeholder="Username" name="username" required autocomplete="off" autofocus>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Password</label>
                                        <span class="icon is-small is-left">
                                                <ion-icon name="lock-closed"></ion-icon>
                                        </span>
                                        <div class="control has-icons-left">
                                            <input class="input" type="password" placeholder="Password" name="password" required autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <button class="button is-link" type="submit" name="login">
                                            <ion-icon name="log-in" class="mr-2"></ion-icon>Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
</body>

</html>
