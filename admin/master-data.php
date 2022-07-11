<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("Location: login.php");
}
include 'koneksi.php';
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/admin/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/sop_keperawatan/admin" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <a class="btn btn-block bg-gradient-danger" href="logout.php">Logout</a>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="../assets/admin/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Administrator</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../assets/admin/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Hallo Admin</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/sop_keperawatan/admin" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Master Data</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Master Data</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Master Data</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#tambah">Tambah Data +
                            </button>
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Jenis File</th>
                                        <th>Kategori</th>
                                        <th>File Upload</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $query = mysqli_query($koneksi, "SELECT * FROM data_spo");
                                    while ($data = mysqli_fetch_assoc($query)) {
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $data['jenis']; ?></td>
                                            <td><?= $data['kategori']; ?></td>
                                            <td><?= $data['file']; ?></td>
                                            <td class="text-center"><a href="#" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $data['id']; ?>">Edit Data</a> | <a href="master-data.php?act=delete&id=<?= $data['id']; ?>" onclick="return confirm('Data akan di hapus ?');" class="btn btn-danger">Delete Data</a>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit Data-->
                                        <div class="modal fade" id="edit<?= $data['id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <?php
                                                            $id = $data['id'];
                                                            $queryEdit = mysqli_query($koneksi, "SELECT * FROM data_spo WHERE id='$id'");
                                                            while ($dataEdit = mysqli_fetch_array($queryEdit)) {
                                                            ?>
                                                                <input type="text" name="id" value="<?= $dataEdit['id']; ?>" hidden>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Nama Jenis File</label>
                                                                    <input type="text" name="jenis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $dataEdit['jenis']; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Kategori</label>
                                                                    <select name="kategori" class="form-control" id="exampleFormControlSelect1" required>
                                                                        <option>Maternitas</option>
                                                                        <option>Anak dan Bayi</option>
                                                                        <option>Gawat Darurat Kritis</option>
                                                                        <option>Umum</option>
                                                                        <option>Keperawatan Medikal Bedah</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlFile1">Tambah File</label>
                                                                    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                                                                    File Tersimpan = <?= $dataEdit['file']; ?>
                                                                </div>
                                                            <?php } ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" name="submitEdit" class="btn btn-primary">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        $no++;
                                    };
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2022 <a href="#">Administrator</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- Modal tambah data -->
    <!-- Button trigger modal -->


    <!-- Modal Tambah Data-->
    <div class="modal fade" id="tambah" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Jenis File</label>
                            <input type="text" name="jenis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kategori</label>
                            <select name="kategori" class="form-control" id="exampleFormControlSelect1" required>
                                <option>Maternitas</option>
                                <option>Anak dan Bayi</option>
                                <option>Gawat Darurat Kritis</option>
                                <option>Umum</option>
                                <option>Keperawatan Medikal Bedah</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Tambah File</label>
                            <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- REQUIRED SCRIPTS -->


    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <!-- AdminLTE App -->
    <script src="../assets/admin/js/adminlte.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>

<!-- Fungsi Upload File -->
<?php
if (isset($_POST['submit'])) {
    $jenis = $_POST['jenis'];
    $kategori = $_POST['kategori'];

    // fungsi upload
    $angkaRandom = rand();
    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $tmpFile = $_FILES['file']['tmp_name'];
    $cekExt = ['jpg', 'jpeg', 'png', 'doc', 'docx', 'xlsx', 'pptx', 'pdf'];
    $lokasiUpload = "../assets/download/";
    $jenisFile = explode('.', $namaFile);
    $filterFile = strtolower(end($jenisFile));
    if (!in_array($filterFile, $cekExt)) {
        echo "<script>
        alert('Jenis file yang anda upload salah/belum mendukung, silahkan upload lagi');
        </script>";
    } else {
        if ($ukuranFile < 1000000) {
            $newNamaFile = $angkaRandom . '_' . $namaFile;
            move_uploaded_file($tmpFile, $lokasiUpload . $newNamaFile);
            mysqli_query($koneksi, "INSERT INTO data_spo VALUES(NULL, '$jenis','$kategori','$newNamaFile')");
            echo "<script>
            alert('data berhasil di tambahkan');
            document.location.href = 'master-data.php';
            </script>";
        } else {
            echo "<script>
            alert('File yang anda upload Terlalu besar, silahkan upload lagi');
            </script>";
        }
    }
} else if (isset($_GET['act']) == 'delete') {
    $id = $_GET['id'];
    $getFile = mysqli_query($koneksi, "SELECT file FROM data_spo WHERE id='$id'");
    $arrFile = mysqli_fetch_assoc($getFile);
    unlink("../assets/download/" . $arrFile['file']);

    mysqli_query($koneksi, "DELETE FROM data_spo WHERE id='$id'");
    if (mysqli_affected_rows($koneksi) > 0) {
        echo "<script>
              alert('data berhasil di hapus');
              document.location.href = 'master-data.php';
              </script>";
    } else {
        echo "<script>
            alert('data gagal di hapus');
            document.location.href = 'master-data.php';
            </script>";
    }
} else if (isset($_POST['submitEdit'])) {
    $angkaRandom = rand();
    $id = $_POST['id'];
    $jenis = $_POST['jenis'];
    $kategori = $_POST['kategori'];
    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $tmpFile = $_FILES['file']['tmp_name'];
    $cekExt = ['jpg', 'jpeg', 'png', 'doc', 'docx', 'xlsx', 'pptx', 'pdf'];
    $lokasiUpload = "../assets/download/";
    $jenisFile = explode('.', $namaFile);
    $filterFile = strtolower(end($jenisFile));

    if ($namaFile == "") {
        $query = mysqli_query($koneksi, "UPDATE data_spo SET jenis='$jenis',kategori='$kategori' WHERE id='$id'");
        if (mysqli_affected_rows($koneksi) > 0) {
            echo "<script>
            alert('data berhasil di edit');
            document.location.href = 'master-data.php';
            </script>";
        } else {
            echo "<script>
            alert('data gagal di edit !');
            document.location.href = 'master-data.php';
            </script>";
        }
    } else {
        if (!in_array($filterFile, $cekExt)) {
            echo "<script>
            alert('Jenis file yang anda upload salah/belum mendukung, silahkan upload lagi');
            </script>";
        } else {
            if ($ukuranFile < 10000000) {
                $getFile = mysqli_query($koneksi, "SELECT file FROM data_spo WHERE id='$id'");
                $fileLama = mysqli_fetch_assoc($getFile);
                unlink("../assets/download/" . $fileLama['file']);

                $newNamaFile = $angkaRandom . '_' . $namaFile;
                move_uploaded_file($tmpFile, $lokasiUpload . $newNamaFile);
                mysqli_query($koneksi, "UPDATE data_spo SET jenis='$jenis',kategori='$kategori', file='$newNamaFile' WHERE id='$id'");
                echo "<script>
            alert('data berhasil di Edit');
            document.location.href = 'master-data.php';
            </script>";
            } else {
                echo "<script>
                alert('File yang anda upload Terlalu besar, silahkan upload lagi');
                </script>";
            }
        }
    }
}


?>