<?php
///link dinamis
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {

        case 'regis':
            include "regis.php";
            break;
        case 'login':
            include "login.php";
            break;
        case 'logout':
            include "logout.php";
            break;
        case 'mhs_dashboard':
            include "mhs_dashboard";
            break;
        case 'mhs_daftar':
            include "mhs_daftar.php";
            break;
        case 'mhs_kumpul':
            include "mhs_kumpul.php";
            break;
        case 'mhs_assesment':
            include "mhs_assesment.php";
            break;

        case 'sekjur_index':
            include "sekjur_index.php";
            break;
        case 'sekjur_file':
            include "sekjur_file.php";
            break;

        default:
            echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
            break;
    }
} else {
    include "mhs_index.php";
}
