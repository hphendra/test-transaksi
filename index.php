<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Transaksi</title>
</head>

<body>
    <div class="box_transaksi">
        <h1 class="desc_fi">Form Input</h1>
        <a href="./proses-semua-transaksi.php" class="button_pst">Proses Semua Transaksi</a>

        <div class="line"></div>

        <h1 class="desc_fi">Histori</h1>
        <div class="history">
            <?php
            $sql = new mysqli('localhost', 'root', '', 'test-transaksi');

            $tanggal = '05/01/2020';
            $select_histori = $sql->query("SELECT * FROM `history` WHERE `tanggal`='$tanggal' ");

            // CEK ROWS
            $cek = mysqli_num_rows($select_histori);
            if ($cek == 0) {
                ?>
                <h4>Belum ada data</h4>
                <?php
            } else {
            ?>
                <table>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Total Belanja</th>
                    </tr>
                    <?php
                    while ($row_histori = mysqli_fetch_assoc($select_histori)) {
                    ?>
                        <tr>
                            <td><?php echo $row_histori['id']; ?></td>
                            <td><?php echo $row_histori['nama_pelanggan']; ?></td>
                            <td><?php echo $row_histori['tanggal']; ?></td>
                            <td><?php echo $row_histori['total_belanja']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            <?php
            }
            ?>
        </div>
    </div>
</body>

<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .box_transaksi {
        width: 600px;
        padding: 40px;
        background-color: #fafafa;
        margin: 50px auto 0 auto;
        border-radius: 20px;
        box-sizing: border-box;
    }

    .desc_fi {
        margin-top: 0;
        font-weight: bold;
        font-size: 25px;
        margin-bottom: 30px;
    }

    .button_pst {
        background-color: #f39c12;
        padding: 10px 15px;
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        font-size: 15px;
        border-radius: 5px;
    }

    .line {
        width: 100%;
        height: 1px;
        background-color: #ddd;
        margin-top: 50px;
        margin-bottom: 40px;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

</html>