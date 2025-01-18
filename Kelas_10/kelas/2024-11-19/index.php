<?php
session_start();
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "tokoku";

    $koneksi = mysqli_connect($host, $user, $password, $database);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <a href="index.php"><img src="images/1.png" alt=""></a>
            </div>
            <div class="judul">
                <h2>Tokoku</h2>
            </div>
            <div class="nav">
                <ul>
                    <li><a href="?menu=produk">Produk</a></li>
                    <li><a href="?menu=cart">cart</a></li>
                    <?php
                        if (!isset($_SESSION["email"])) {
                    ?>
                        <li><a href="?menu=register">register</a></li>
                        <li><a href="?menu=login">log-in</a></li>
                    <?php
                    } else {
                    ?>
                        <li><?= $_SESSION["email"] ?></li>
                        <li><a href="?menu=logout">log-out</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="content">
            <?php
            if (isset($_GET["menu"])) {
                $menu = $_GET["menu"];

                if($menu == "cart"){
                    require_once("pages/cart.php");
                }
                if ($menu == "login") {
                    require_once("pages/login.php");
                }
                if($menu == "register"){
                    require_once("pages/register.php");
                }
                if ($menu == "logout") {
                    require_once("pages/logout.php");
                }
                if ($menu == "produk") {
                    require_once("pages/produk.php");
                }

            } else {
                require_once("pages/produk.php");
            }
            ?>
        </div>
        <div class="footer">
            <p><i>Web ini dibuat oleh : Much.Rafid Syaakir</i></p>
        </div>
    </div>
</body>
</html>