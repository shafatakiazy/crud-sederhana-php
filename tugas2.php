<?php
// 1. KONEKSI KE DATABASE MYSQL
$koneksi = mysqli_connect("localhost", "root", "", "db_sederhana");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// 2. TAMBAH DATA (CREATE)
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];

    mysqli_query($koneksi, "INSERT INTO barang VALUES ('', '$nama', '$jumlah')");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// 3. HAPUS DATA (DELETE)
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    mysqli_query($koneksi, "DELETE FROM barang WHERE id=$id");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// 4. UPDATE DATA (UPDATE)
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];

    mysqli_query($koneksi, "UPDATE barang SET nama_barang='$nama', jumlah='$jumlah' WHERE id=$id");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// AMBIL DATA UNTUK EDIT
$data_edit = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $ambildata = mysqli_query($koneksi, "SELECT * FROM barang WHERE id=$id");
    $data_edit = mysqli_fetch_array($ambildata);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi CRUD Sederhana</title>
</head>
<body>

    <h2>Form Data Barang</h2>

    <!-- FORM INPUT (action dikosongin biar tetep di halaman ini) -->
    <form action="" method="POST">
        <?php if ($data_edit) { ?>
            <input type="hidden" name="id" value="<?php echo $data_edit['id']; ?>">
        <?php } ?>

        Nama Barang: <br>
        <input type="text" name="nama_barang" value="<?php if($data_edit) echo $data_edit['nama_barang']; ?>" required><br><br>

        Jumlah: <br>
        <input type="number" name="jumlah" value="<?php if($data_edit) echo $data_edit['jumlah']; ?>" required><br><br>

        <?php if ($data_edit) { ?>
            <button type="submit" name="update">Update Data</button>
            <a href="index.php">Batal</a>
        <?php } else { ?>
            <button type="submit" name="tambah">Simpan Data</button>
        <?php } ?>
    </form>

    <hr>

    <h2>Daftar Barang</h2>

    <!-- TABEL UNTUK MENAMPILKAN DATA (READ) -->
    <table border="1" cellpadding="5">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $tampil = mysqli_query($koneksi, "SELECT * FROM barang");
        while ($row = mysqli_fetch_array($tampil)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['nama_barang']; ?></td>
                <td><?php echo $row['jumlah']; ?></td>
                <td>
                    <a href="?edit=<?php echo $row['id']; ?>">Edit</a> | 
                    <a href="?hapus=<?php echo $row['id']; ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>