<?php
session_start();
include('../asset/navbar.php');
include_once('../asset/koneksi.php');

// tendang manusia yang berani masuk tanpa login
if(!isset($_SESSION['id'])){
    echo "<script>
            window.location.href = '../index.php';
        </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- datatables -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

    <style>
        .tableabsenall{
            justify-items: center;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">All Absen</h1>
    <div style="width: 100%;" class="tableabsenall">
        <table id="tableabsen" class="table table-hover table-bordered border-success">
            <thead>
                <tr style="text-align: center;" class="table-primary">
                    <th>Nama</th>
                    <!-- <th>Kelas</th> -->
                    <th>Keterangan</th>
                    <th>Gambar</th>
                    <th>Alasan Tidak Masuk</th>
                    <th>Tgl/Waktu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $Qviewabsen = "SELECT * FROM absensi";
                $Rviewabseen = mysqli_query($conn, $Qviewabsen);

                while($data = mysqli_fetch_assoc($Rviewabseen)){
                    $gambar = $data['foto'];
                ?>
                <tr style="text-align: center;">
                    <td><?php echo $data['username'] ?></td>

                    <!-- untuktablesituasi -->
                    <?php
                        if($data['keterangan'] == 'hadir'){
                            $tableclass = 'table-success';
                        }else{
                            $tableclass = 'table-danger';
                        }
                    ?>

                    <td class="<?php echo $tableclass ?>"><?php echo $data['keterangan'] ?></td>

                    <td><img style="width: 90px;" src="<?php echo $gambar ?>" alt=""></td>
                    <td><?php echo $data['alasantidakhadir'] ?></td>
                    <td class="table-warning"><?php echo $data['tanggal'] ?></td>
                </tr>

            <?php }?>
            </tbody>
        </table>
    </div>

    <script src="../asset/bootstrap/js/bootstrap.min.js"></script>
    <script>
        new DataTable('#tableabsen');
    </script>
</body>
</html>