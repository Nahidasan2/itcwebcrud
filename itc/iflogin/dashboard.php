<?php
session_start();
include('../asset/navbar.php');
include_once('../asset/koneksi.php');

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
    <title>Dashboard</title>
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- datatables -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
</head>
<body>
    <!-- <h1>DASHBOARD</h1> -->
    <div style="margin:auto; width: 90%;">
    <div class="text-end w-100 mt-2">
        <a href="ticket.php" class="btn btn-primary">Create Ticket <i class="bi bi-ticket-perforated"></i></a>
    </div>

    <table id="tableitc" class="table table-hover table-dark table-bordered border-success mt-2">
        <thead>
        <tr style="text-align: center;" class="table-info">
            <th style="text-align:center;">Nama</th>
            <th style="text-align:center;">Nomor Telepon</th>
            <th style="text-align:center;">Jabatan</th>
            <th style="text-align:center;">Kategori</th>
            <th style="text-align:center;">Subject</th>
            <th style="text-align:center;">Foto</th>
            <th style="text-align:center;">Deskripsi</th>
            <th style="text-align:center;">Status</th>
            <th style="text-align:center;">Pekerja</th>
            <th style="text-align:center;" colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once('../asset/koneksi.php');

        $Qview = "SELECT * FROM permintaan";
        $Rview = mysqli_query($conn, $Qview);

        while($data = mysqli_fetch_assoc($Rview)){

            $gambar = $data['gambar'];
        ?>
        <tr style="text-align: center;">
            <td style="text-align:center;"><?php echo $data['username']; ?></td>
            <td style="text-align:center;"><?php echo $data['nomortelepon']; ?></td>
            <td style="text-align:center;"><?php echo $data['jabatan']; ?></td>
            <td style="text-align:center;"><?php echo $data['kategori']; ?></td>
            <td style="text-align:center;"><?php echo $data['SUBJECT']; ?></td>
            <!-- Gambar -->
            <td style="text-align:center;"><img src="<?php echo $gambar ?>" alt="Gambar Absensi" style="width: 180px;">
            </td>
            
            <td style="text-align:center;"><?php echo $data['deskripsi']; ?></td>
            <td style="width: 5%;">
            <?php 
        if ($data['STATUS'] == 'dikerjakan') {
            $btnClass = 'btn-danger'; // Merah untuk status dikerjakan
        } elseif ($data['STATUS'] == 'selesai') {
            $btnClass = 'btn-success'; // Hijau untuk status selesai
        } else {
            $btnClass = 'btn-warning'; // Kuning untuk status lainnya
        }
    ?>    
            <button type="button" class="btn <?php echo $btnClass ?>"><?php echo $data['STATUS']; ?></button>
        </td>
        <td>
            <?php
                if($data['pekerja'] == 'waiting'){
                    $Pekerja = 'btn-warning';
                }else{
                    $Pekerja = 'btn-success';
                }
            ?>
            <button type="button" class="btn <?php echo $Pekerja ?>"><?php echo $data['pekerja'] ?></button>
        </td>
            <td style="width: 9%;"><a class="btn btn-warning" href="detail.php?id=<?php echo$data['id']; ?>">Detail <i class="bi bi-ticket-detailed"></i></a></td>
            <td style="width: 5%;"><a class="btn btn-danger" href="?id=<?php echo $data['id']; ?>"><i class="bi bi-trash"></i></a></td>
        </tr>
            
        <?php } ?>
        </tbody>
    </table>
</div>    
    <script src="asset/bootstrap/js/bootstrap.min.js"></script>
    <script>
        new DataTable('#tableitc');
    </script>
</body>
</html>
<?php
$getdata = mysqli_query($conn, "SELECT * FROM permintaan");
$jumlahdata = mysqli_num_rows($getdata);

//delete
if(isset($_GET['id'])){
    $Qdelete = "DELETE FROM permintaan WHERE id='$_GET[id]'";
    $Rdelete = mysqli_query($conn, $Qdelete);

    if($Rdelete){
        echo "
        <script>
        alert('Data Sudah Dihapus!');
        location.href = 'dashboard.php';
        </script>
        ";
    }
}
?>