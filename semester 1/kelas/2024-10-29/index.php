<?php 
$sekolah = ["Paud Siti fatimah",
            "MI ma'rif Pagerwojo",
            "SMPN 2 Sidoarjo",
            "SMKN 2 Buduran"
            ];

$sekolas = ["TK"=> "Paud siti fatimah",
            "SD"=> "MI ma'arif pagerwojo",
            "SMP"=> "SMPN 2 Sidoarjo",
            "SMK"=> "SMKN 2 Buduran",
            "PT" => "Universitas Negeri Surabaya"
             ];

$skills = [ "C++" => "expert",
            "HTML" => "Newbie",
            "CSS" => "Newbie",
            "PHP" => "intermediate",
            "Javascript" => "intermediate"
            ];

$identitas = [  "Nama"=>"Rafid",
                "alamat" => "Perum Magersari",
                "Email"=>"rafidsyakir30@gmail.com",
                "IG"=>"Rapitttd",
                "Tiktok"=>"rapittd"
];

$hobi =["Coding",
        "Musik",
        "Mancing",
        "Sepeda",
        "Membaca"

];

// echo $sekolah[0];
// echo "<br>";
// echo $sekolas["TK"];
// echo "<br>";
// echo $sekolah[1];
// echo "<br>";
// echo $sekolas["SD"];

// echo "<br>";


// for ($i=0; $i < 4; $i++){
//     echo $sekolah[$i];
//     echo "<br>";
// }

//  foreach ($sekolah as $key){
//     echo $key;
//     echo "<br>";
//  }
//     echo "<br>";

//  foreach ($sekolas as $key => $value){
//     echo $key;
//     echo "=";
//     echo $value;
//     echo "<br>";
//  }
//  foreach ($skills as $key => $value){
//     echo $key;
//     echo "=";
//     echo $value;
//     echo "<br>";
//  }
 
if (isset($_GET["menu"])) {
    $menu = $_GET["menu"];
    echo $menu;
}
$menu = $_GET["menu"];
echo $menu;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <hr>
    <ul>
        <li><a href="?menu = home"></a> Home</li>
        <li><a href="?menu = cv"></a>CV</li>
        <li><a href="?menu = project"></a>Project</li>
        <li><a href="?menu = contact"></a>Contact</li>
    </ul>
    <h2>Identitas</h2>
    <table>
        <thead>
            <tr>
                <th>Identitas</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($identitas as $key => $value){
            ?>   
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $value ?></td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
    <h2>Riwayat Sekolah</h2>
    <table border="1px">
    <thead>
        <tr>
            <th>Jenjang</th>
            <th>Nama sekolah</th>
        </tr>
    </thead>
        <tbody>
            <?php 
            foreach ($sekolas as $key => $value){
                echo "<tr>";
                echo "<td>";
                echo $key;
                echo "</td>";
                echo "<td>";
                echo $value;
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <h2>Skills</h2>
    <table border="1px">
        <thead>
            <tr>
                <th>Skill</th>
                <th>Level</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($skills as $key => $value){
            ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $value ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <hr>
    <h2>Hobi</h2>
    <ul>
        <?php
            foreach ($hobi as $key => $value) {
            ?>

            <li><?= $key ?></li>

            <?php
            }
        ?>
    </ul>
</body>
</html>