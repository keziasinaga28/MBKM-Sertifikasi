<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE-edge" />
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

    <!--- Fonts and Icons-->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "Families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                url: ['assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!---Css Files-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.css">
    <link rel="stylesheet" href="assets/css/atlantis2.css">
</head>

<body class="login">
    <div class="wrapper wrapper-login wrapper-login-full p-0">
        <div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
            <h1 class="fw-bold text-white mb-3 text-desc">PENGELOLAAN MAHASISWA PESERTA MBKM</h1>
            <p class="subtitle text-white op-7">POLITEKNIK NEGERI BATAM</p>
        </div>
        <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
            <div class="container container-login container-transparent animated fadeIn">
                <div class="w3-card-4 text-center">
                    <img src="assets/img/kampusmerdeka.png" height="170" alt="Logo">
                </div>
                <form action="" method="post">
                    <input type="hidden" name="token" value="9Kylnkoreo7zASjqMh4eEx0Hx9b4h5e2"></input>
                    <div class="login-form">
                        <div class="form-group">
                            <label for="nim_nik" class="placeholder"><b>NIM/NIK</b></label>
                            <input id="nim_nik" name="nim_nik" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="placeholder"><b>Password</b></label>
                            <div class="position-relative">
                                <input id="password" name="password" type="password" class="form-control" required>
                                <div class="show-password">
                                    <i class="icon-eye"></i>
                                </div>
                            </div>
                            <a href="index.php?page=regis">
                                <h5>Sudah punya akun belum?</h5>
                            </a>
                            <div class="form-group form-action-d-flex mb-3" text-align="center">
                                <button type="submit" name="login" value="Login" class="btn btn-secondary col-md-5 float-right mt-3 mt-sm-0 fw-bold text-white">Masuk</button>
                            </div>
                </form>
                <div class="login-account">
                    <!-- <span class="msg">Don't have an account yet ?</span> -->
                    <!-- <a href="#" id="show-signup" class="link">Sign Up</a> -->
                    <br>
                    <?php
                    include 'config.php';
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));

                    //$bcrypt = new Bcrypt(16);

                    if ($_POST['login']) {

                        $nim_nik = mysqli_real_escape_string($conn, $_POST['nim_nik']);
                        $password = mysqli_real_escape_string($conn, $_POST['password']);

                        if ($nim_nik && $password) {
                            $cek = $conn->query("SELECT * FROM tb_user LEFT JOIN tb_informasi ON tb_user.nim_nik = tb_informasi.nim_nik WHERE tb_user.nim_nik = '$nim_nik'");

                            if (mysqli_num_rows($cek) != 0) {
                                $data = mysqli_fetch_assoc($cek);
                                $id_user       = $data['id_user'];
                                $nama_lengkap = $data['nama_lengkap'];
                                $nim_nik = $data['nim_nik'];
                                $role = $data['role'];

                                $hash   = $data['password'];
                                $verify = password_verify($password, $hash);

                                if ($nim_nik == $data['nim_nik'] && $verify == 1) {
                                    session_start();
                                    $_SESSION['id_user'] = $id_user;
                                    $_SESSION['nama_lengkap'] = $nama_lengkap;
                                    $_SESSION['nim_nik'] = $nim_nik;
                                    $_SESSION['role'] = $role;
                                    $_SESSION['login_status'] = "login";

                                    $length = 32;
                                    $_SESSION['token'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);

                                    if ($role == "mahasiswa") {
                                        echo "
                                        <script type='text/javascript'>
                                        setTimeout(function () { 
                                        swal({
                                                    title: 'Berhasil Login',
                                                    type: 'success',
                                                    timer: 2000,
                                                    showConfirmButton: true
                                                });  
                                        },10); 
                                        window.setTimeout(function(){ 
                                            window.location.replace('index.php?page=mhs_daftar');
                                        } ,3000); 
                                        </script>
                                        ";
                                    } elseif ($role == "dosen") {
                                        echo "
                                    <script type='text/javascript'>
                                    setTimeout(function () { 
                                    swal({
                                                title: 'Berhasil Login',
                                                type: 'success',
                                                timer: 2000,
                                                showConfirmButton: true
                                            });
                                    },10); 
                                    window.setTimeout(function(){ 
                                    window.location.replace('index.php?page=sekjur_index');
                                    } ,3000); 
                                    </script>
                                    ";
                                    }
                                } else {
                                    echo '<div class="alert alert-success" role="alert">Gagal Masuk. nim/nik and password Salah.</div>';
                                }
                            } else {
                                // echo("Error description: " . $conn -> error);
                                echo '<div class="alert alert-danger" role="alert">Gagal Masuk. Anda Belum Terdaftar.</div>';
                            }
                        } else {
                            echo ("Error description: " . $conn->error);
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <!-- jQuery UI -->
    <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
    <!-- Bootstrap Toggle -->
    <script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Atlantis JS -->
    <script src="assets/js/atlantis.min.js"></script>
    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo2.js"></script>
</body>

</html>