<?php
$lokasiDownload = "assets/download/";
$namaFile = $lokasiDownload . $_GET['file'];
if (file_exists($namaFile)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($namaFile));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: private');
    header('Pragma: private');
    header('Content-Length: ' . filesize($namaFile));
    ob_clean();
    flush();
    readfile($namaFile);

    exit;
} else {
    echo "<script>
    alert('File tidak ada');
    </script>";
}
