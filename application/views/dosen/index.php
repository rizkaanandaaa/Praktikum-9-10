<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosen</title>
    <script>
        function hapusDosen(pesan){
            if (confirm(pesan)) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</head>
<?php
$username = $this->session->userdata('username');
if($username){
    echo "<h2>Selamat Datang $username</h2>";
}
?>
<body>
    <div class="col-md-12">
    <h3>Dosen</h3>
    <table border="1" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIDN</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Gender</th>
                <th>Tempat Lahir</th>
                <th>Pendidikan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            foreach ($dosen as $dsn) {
            ?>
            <tr>
                <td><?php echo $nomor ?></td>
                <td><?php echo $dsn -> nidn ?> </td>
                <td><?php echo $dsn -> id ?></td>
                <td><?php echo $dsn -> nama ?></td>
                <td><?php echo $dsn -> tgl_lahir ?></td>
                <td><?php echo $dsn -> gender ?></td>
                <td><?php echo $dsn -> tmp_lahir ?></td>
                <td><?php echo $dsn -> pendidikan ?></td>
            </tr>
            <?php
            $nomor++;
            }
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>