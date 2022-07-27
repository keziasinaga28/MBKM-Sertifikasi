<?php
include 'config.php';

session_start();
if ($_SESSION['login_status'] != 'login') {
    echo "
    <script>
        alert('YOU ARE NOT LOGIN');
        window.location.replace('index.php?page=login');
        </script>
        ";
}
$id_user = $_SESSION['id_user'];
$nim_nik = $_SESSION['nim_nik'];
$nama_lengkap = $_SESSION['nama_lengkap'];
$role = $_SESSION['role'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>PENGELOLAAN MAHASISWA PESERTA MBKM</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
</head>

<body>
    <div class="wrapper fullheight-side sidebar_minimize">
        <!-- Logo Header -->
        <div class="logo-header position-fixed" data-background-color="blue">

            <a href="index.html" class="logo">
                <img src="assets/img/polibatam.png" height="50" alt="navbar brand" class="navbar-brand">
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="icon-menu"></i>
                </span>
            </button>
            <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="icon-menu"></i>
                </button>
            </div>
        </div>
        <!-- End Logo Header -->
        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2" data-background-color="blue">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav">
                        <li class="nav-item active">
                            <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>MAHASISWA</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="dashboard">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="index.php?page=mhs_daftar">
                                            <span class="sub-item">Formulir Pendaftaran</span>
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a href="index.php?page=mhs_kumpul">
                                            <span class="sub-item">Pengumpulan Berkas</span>
                                        </a>
                                    </li> -->
                                    <li>
                                        <a href="index.php?page=mhs_assesment">
                                            <span class="sub-item">Assesment</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg">

            <div class="container-fluid">
                <div class="collapse" id="search-nav">
                    <form class="navbar-left navbar-form nav-search nav-search-round mr-md-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-search pr-1">
                                    <i class="fa fa-search search-icon"></i>
                                </button>
                            </div>
                            <input type="text" placeholder="Search ..." class="form-control">
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    <li class="nav-item toggle-nav-search hidden-caret">
                        <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
                    <div class="title-name mt-2 text-black">
                        <h5><b>Hi, <?php echo $_SESSION['nama_lengkap'] ?></b> &nbsp;</h5>
                    </div>
                    <li class="nav-item dropdown hidden-caret">
                        <a class="nav-link dropdown-toggle" href="index.php?page=logout" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sign-out-alt" title="Logout"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="main-panel full-height">
            <div class="container">
                <div class="panel-header">
                    <!-- <div class="page-inner border-bottom pb-0 mb-3">
                        <div class="d-flex align-items-left flex-column">
                            <h2 class="pb-2 fw-bold">Dashboard</h2>
                        </div>
                    </div> -->
                </div>
                <div class="page-inner">
                    <div class="row">
                    </div>
                    <div class="row row-card-no-pd">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <h4 class="card-title">FORMULIR PENDAFTARAN</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="proses.php?PageAction=tambah_daftar" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" id="token" name="token" value="<?php echo $token; ?>"></input>
                                                    <input type="hidden" id="token" name="status" value="diajukan"></input>
                                                    <div class="form-group">
                                                        <label for="nim_nik">NIM<span class="required-label">*</span></label>
                                                        <input type="text" class="form-control" name="nim_nik" value="<?= $nim_nik ?>" readonly id="nim_nik">
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="nama">Nama Lengkap<span class="required-label">*</span></label>
                                                        <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $_SESSION['nama_lengkap'] ?>" disabled required id="nama_lengkap" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="prodi">Program Studi</label>
                                                        <select class="form-control" name="prodi">
                                                            <option value="Teknik Informatika">Teknik Informatika</option>
                                                            <option value="Teknik Multimedia dan Jaringan">Teknik Multimedia dan Jaringan</option>
                                                            <option value="Teknik Geomatika">Teknik Geomatika</option>
                                                            <option value="Animasi">Animasi</option>
                                                            <option value="Rekayasa Keamanan Siber">Rekayasa Keamanan Siber</option>
                                                            <option value="Teknik Rekayasa Perangkat Lunak">Teknik Rekayasa Perangkat Lunak</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="angkatan">Angkatan<span class="required-label">*</span></label>
                                                        <input type="text" class="form-control" name="angkatan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="program">Program<span class="required-label">*</span></label>
                                                        <input type="text" class="form-control" name="program">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jenis_mbkm">Jenis MBKM<span class="required-label">*</span></label>
                                                        <input type="text" class="form-control" name="jenis_mbkm">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tempat_kegiatan">Tempat Kegiatan<span class="required-label">*</span></label>
                                                        <input type="text" class="form-control" name="tempat_kegiatan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bukti_penerimaan">Bukti Penerimaan dari Program<span class="required-label">*</span></label>
                                                        <input type="file" class="form-control" name="bukti_penerimaan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="matkul">Mata Kuliah yang diklaim<span class="required-label">*</span></label> <br>
                                                        <input type="checkbox" name="checklist[]" value="Pemograman Web"><label>Pemograman Web</label><br>
                                                        <input type="checkbox" name="checklist[]" value="Basis Data"><label>Basis Data </label><br>
                                                        <input type="checkbox" name="checklist[]" value="Sistem Informasi"><label>Sistem Informasi </label><br>
                                                        <input type="checkbox" name="checklist[]" value="Jaringan Komputer"><label>Jaringan Komputer</label> <br>
                                                        <input type="checkbox" name="checklist[]" value="Magang Industri"><label>Magang Industri</label> <br>
                                                        <input type="checkbox" name="checklist[]" value="Sistem Komputer"><label>Sistem Komputer</label> <br>
                                                        <input type="checkbox" name="checklist[]" value="Rekayasa Perangkat Lunak"><label>Rekayasa Perangkat Lunak</label><br>
                                                        <input type="checkbox" name="checklist[]" value="Interaksi Manusia Komputer"><label>Interaksi Manusia Komputer</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="semester">Semester<span class="required-label">*</span></label>
                                                        <input type="text" class="form-control" name="semester">
                                                    </div>
                                                    <div class="form-check border-top-0 d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-primary text-white" name="submit">submit</button>
                                                    </div>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="http://www.themekita.com">
                                    ThemeKita
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Help
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright ml-auto">
                        2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="http://www.themekita.com">ThemeKita</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Moment JS -->
    <script src="assets/js/plugin/moment/moment.min.js"></script>

    <!-- Chart JS -->
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- Bootstrap Toggle -->
    <script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

    <!-- Google Maps Plugin -->
    <script src="assets/js/plugin/gmaps/gmaps.js"></script>

    <!-- Dropzone -->
    <script src="assets/js/plugin/dropzone/dropzone.min.js"></script>

    <!-- Fullcalendar -->
    <script src="assets/js/plugin/fullcalendar/fullcalendar.min.js"></script>

    <!-- DateTimePicker -->
    <script src="assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

    <!-- Bootstrap Tagsinput -->
    <script src="assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

    <!-- Bootstrap Wizard -->
    <script src="assets/js/plugin/bootstrap-wizard/bootstrapwizard.js"></script>

    <!-- jQuery Validation -->
    <script src="assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>

    <!-- Summernote -->
    <script src="assets/js/plugin/summernote/summernote-bs4.min.js"></script>

    <!-- Select2 -->
    <script src="assets/js/plugin/select2/select2.full.min.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Owl Carousel -->
    <script src="assets/js/plugin/owl-carousel/owl.carousel.min.js"></script>

    <!-- Magnific Popup -->
    <script src="assets/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Atlantis JS -->
    <script src="assets/js/atlantis.min.js"></script>

    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script>

    <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable({});

            $('#multi-filter-select').DataTable({
                "pageLength": 10,
                initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $(
                                '<select class="form-control"><option value=""></option></select>'
                            )
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                }
            });

            // Add Row
            $('#add-row').DataTable({
                "pageLength": 5,
            });

            var action =
                '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $('#addRowButton').click(function() {
                $('#add-row').dataTable().fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action
                ]);
                $('#addRowModal').modal('hide');

            });
        });
    </script>
</body>

</html>