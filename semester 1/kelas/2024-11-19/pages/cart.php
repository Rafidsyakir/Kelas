<?php 
if (!isset($_SESSION["email"])) {
    header("location:index.php?menu=login");
}
if (isset($_GET["hapus"])) {
    $id = $_GET["hapus"];
    unset($_SESSION["cart"][$id]);
}

$cart = count($_SESSION["cart"]);
if ($cart == 0) {
    header("location:index.php");
}


if (isset($_GET["add"])) {
    $id = $_GET["add"];
    $sql = "SELECT * FROM produk WHERE id=$id";
    echo $sql;
    $hasil = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($hasil);
    echo $row["id"];
    echo $row["produk"];
    echo $row["harga"];
    $_SESSION["cart"][$row["id"]]=[
        "id"     => $row["id"],
        "produk" => $row["produk"],
        "harga"  => $row["harga"],
        "jumlah" => isset($_SESSION["cart"][$row["id"]]) ? $_SESSION["cart"][$row["id"]]["jumlah"]+1 : 1
    ];
}
?>
<div class="cart">
    <h1>Cart</h1>
    <table border="1px">
        <thead>
            <tr>
                <th>No.</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
                foreach ($_SESSION["cart"] as $key) {
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $key["produk"] ?></td>
                    <td><?= $key["harga"] ?></td>
                    <td><?= $key["jumlah"] ?></td>
                    <td><?= $key["jumlah"] * $key["harga"] ?></td>
                    <td><a href="?menu=cart&hapus=<?= $key["id"] ?>">hapus</a></td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
