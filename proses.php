<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
include 'config.php';

//proses regis
if ($_GET['PageAction'] == "tambah_regis") {

    $nim_nik        = mysqli_real_escape_string($conn, $_POST['nim_nik']);
    $nama_lengkap   = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
    $email          = mysqli_real_escape_string($conn, $_POST['email']);
    $password       = mysqli_real_escape_string($conn, $_POST['password']);
    $password_hash  = password_hash($password, PASSWORD_DEFAULT);
    $role           = mysqli_real_escape_string($conn, $_POST['role']);

    $tambah_regis = $conn->query("INSERT INTO `tb_informasi` (`nim_nik`, `nama_lengkap`, `email`) VALUES ('$nim_nik', '$nama_lengkap', '$email');");

    if ($tambah_regis) {
        echo "
        <script type='text/javascript'>
        setTimeout(function () { 
        swal({
                    title: 'Berhasil',
                    text:  'Data Berhasil ditambahkan',
                    icon: 'success',
                    buttons: false
                });  
        },10); 
        window.setTimeout(function(){ 
            window.location.replace('index.php?page=login');
        } ,3000); 
        </script>
        ";
    }

    if ($tambah_regis) {
        $tambah_regis_login = $conn->query("INSERT INTO `tb_user` (`id_user`, `nim_nik`, `password`, `role`) VALUES ('', '$nim_nik', '$password_hash', '$role');");

        if ($tambah_regis_login) {
            echo "
            <script type='text/javascript'>
            setTimeout(function () { 
            swal({
                        title: 'Berhasil',
                        text:  'Data Berhasil ditambahkan, silahkan login',
                        icon: 'success',
                        buttons: false
                    });  
            },10); 
            window.setTimeout(function(){ 
                window.location.replace('index.php?page=login');
            } ,3000); 
            </script>
            ";
        } else {
            echo "
        <script type='text/javascript'>
        setTimeout(function () { 
        swal({
            title: 'Gagal',
            text:  'Data Gagal ditambahkan, silahkan masukkan data',
            icon: 'error',
            buttons: false                                            
        });  
    },10); 
    window.setTimeout(function(){ 
        window.location.replace('index.php?page=login');
    } ,3000); 
    </script>
    ";
        }
    }
}

//proses Pendaftaran
if ($_GET['PageAction'] == "tambah_daftar") {

    $id_daftar        = mysqli_real_escape_string($conn, $_POST['id_daftar']);
    $nim_nik  = mysqli_real_escape_string($conn, $_POST['nim_nik']);
    $prodi       = mysqli_real_escape_string($conn, $_POST['prodi']);
    $angkatan     = mysqli_real_escape_string($conn, $_POST['angkatan']);
    $program = mysqli_real_escape_string($conn, $_POST['program']);
    $jenis_mbkm           = mysqli_real_escape_string($conn, $_POST['jenis_mbkm']);
    $tempat_kegiatan         = mysqli_real_escape_string($conn, $_POST['tempat_kegiatan']);
    $bukti_penerimaan        = mysqli_real_escape_string($conn, $_POST['bukti_penerimaan']);
    $semester           = mysqli_real_escape_string($conn, $_POST['semester']);
    $status           = mysqli_real_escape_string($conn, $_POST['status']);

    $post_matkul = $_POST['checklist'];
    $matkul = implode(",", $post_matkul);

    if (isset($_POST['submit'])) {

        $direktori = "berkas/";
        $file_name = $_FILES['bukti_penerimaan']['name'];
        move_uploaded_file($_FILES['bukti_penerimaan']['tmp_name'], $direktori . $file_name);
    }

    $add = $conn->query("INSERT INTO tb_daftar (id_daftar, nim_nik, prodi, angkatan, program, jenis_mbkm, tempat_kegiatan, bukti_penerimaan, semester, matkul, status)
    VALUES ('', '$nim_nik', '$prodi', '$angkatan', '$program', '$jenis_mbkm', '$tempat_kegiatan', '$file_name', '$semester', '$matkul', '$status');");

    if ($add) {
        echo "
            <script type='text/javascript'>
            setTimeout(function () { 
            swal({
                        title: 'Berhasil',
                        text:  'Data Berhasil ditambahkan',
                        icon: 'success',
                        buttons: false
                    });  
            },10); 
            window.setTimeout(function(){ 
                window.location.replace('index.php?page=mhs_assesment');
            } ,3000); 
            </script>
            ";
    } else {
        // echo ("Error description: " . $conn->error);
        echo "
            <script type='text/javascript'>
            setTimeout(function () { 
            swal({
                title: 'Gagal',
                text:  'Data Gagal ditambahkan, silahkan masukkan data',
                icon: 'error',
                buttons: false                                            
            });  
        },10); 
        window.setTimeout(function(){ 
            window.location.replace('index.php?page=login');
        } ,3000); 
        </script>
        ";
    }
}

//proses input berkas
if ($_GET['PageAction'] == "tambah_berkas") {

    $id_file        = mysqli_real_escape_string($conn, $_POST['id_file']);
    $id_daftar        = mysqli_real_escape_string($conn, $_POST['id_daftar']);
    $sertifikat  = mysqli_real_escape_string($conn, $_POST['sertifikat']);
    $laporan       = mysqli_real_escape_string($conn, $_POST['laporan']);
    $luaran     = mysqli_real_escape_string($conn, $_POST['luaran']);
    $tanggal_mulai = mysqli_real_escape_string($conn, $_POST['tanggal_mulai']);
    $tanggal_selesai           = mysqli_real_escape_string($conn, $_POST['tanggal_selesai']);
    $dokumentasi        = mysqli_real_escape_string($conn, $_POST['dokumentasi']);

    if (isset($_POST['submit'])) {

        $direktori = "berkas/";
        $file_sertifikat = $_FILES['sertifikat']['name'];
        move_uploaded_file($_FILES['sertifikat']['tmp_name'], $direktori . $file_sertifikat);

        $direktori = "berkas/";
        $file_laporan = $_FILES['laporan']['name'];
        move_uploaded_file($_FILES['laporan']['tmp_name'], $direktori . $file_laporan);

        $direktori = "berkas/";
        $file_luaran = $_FILES['luaran']['name'];
        move_uploaded_file($_FILES['luaran']['tmp_name'], $direktori . $file_luaran);

        $direktori = "berkas/";
        $file_dokumentasi = $_FILES['dokumentasi']['name'];
        move_uploaded_file($_FILES['dokumentasi']['tmp_name'], $direktori . $file_dokumentasi);
    }

    $tambah_berkas = $conn->query("INSERT INTO tb_file (id_file, id_daftar, sertifikat, laporan, luaran, tanggal_mulai, tanggal_selesai, dokumentasi)
    VALUES ('', '$id_daftar', '$file_sertifikat', '$file_laporan', '$file_luaran', '$tanggal_mulai', '$tanggal_selesai', '$file_dokumentasi ');");

    if ($tambah_berkas) {
        echo "
            <script type='text/javascript'>
            setTimeout(function () { 
            swal({
                        title: 'Berhasil',
                        text:  'Data Berhasil ditambahkan',
                        icon: 'success',
                        buttons: false
                    });  
            },10); 
            window.setTimeout(function(){ 
                window.location.replace('index.php?page=mhs_assesment');
            } ,3000); 
            </script>
            ";
    } else {
        // echo ("Error description: " . $conn->error);
        echo "
            <script type='text/javascript'>
            setTimeout(function () { 
            swal({
                title: 'Gagal',
                text:  'Data Gagal ditambahkan, silahkan masukkan data',
                icon: 'error',
                buttons: false                                            
            });  
        },10); 
        window.setTimeout(function(){ 
            window.location.replace('index.php?page=mhs_assesment');
        } ,3000); 
        </script>
        ";
    }
}

//verifikasi
if ($_GET['PageAction'] == "verifikasi") {

    session_start();
    $token_session = $_SESSION['token'];
    $token_post = mysqli_real_escape_string($conn, $_POST['token']);

    $nim_nik = mysqli_real_escape_string($conn, $_POST['nim_nik']);
    $tambah = mysqli_real_escape_string($conn, $_POST['tambah']);

    $query = mysqli_query($conn, "UPDATE tb_daftar SET status='$tambah' WHERE nim_nik = $nim_nik");
    if ($query) {
        echo "
        <script type='text/javascript'>
        setTimeout(function () { 
        swal({
            title: 'Success',
            text: 'Data berhasil ditambahkan!',
            icon: 'success',
            buttons: false
        }); 
        },10); 
        window.setTimeout(function(){ 
        window.location.replace('index.php?page=sekjur_index');
        } ,2000); 
        </script>
        ";
    } else {
        echo "<script type='text/javascript'>
        setTimeout(function () { 
        swal({
        title: 'Failure!',
        text: 'Data gagal ditambahkan, coba input kembali',
        icon: 'error',
        buttons: false
        }); 
        },10); 
        window.setTimeout(function(){ 
        window.history.back();
        } ,3000); 
    </script>
    ";
    }
}

?>
<!-- Sweet Alert -->
<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>