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
                <form action="proses.php?PageAction=tambah_regis" method="post">
                    <input type="hidden" name="token" value="<?php echo $token; ?>"></input>
                    <input type="hidden" name="role" value="mahasiswa"></input>
                    <div class="login-form">
                        <div class="form-group">
                            <label for="nim_nik" class="placeholder"><b>NIM/NIK</b></label>
                            <input id="nim_nik" name="nim_nik" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap" class="placeholder"><b>Nama Lengkap</b></label>
                            <input id="nama_lengkap" name="nama_lengkap" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="placeholder"><b>Email</b></label>
                            <input id="email" name="email" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="placeholder"><b>Password</b></label>
                            <div class="position-relative">
                                <input id="password" name="password" type="password" class="form-control" required>
                                <div class="show-password">
                                    <i class="icon-eye"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-action-d-flex mb-3" text-align="center">
                            <button type="submit" name="regis" value="regis" class="btn btn-secondary col-md-5 float-right mt-3 mt-sm-0 fw-bold text-white">Sign In</button>
                        </div>
                </form>
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