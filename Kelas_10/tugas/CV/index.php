<?php 

require_once './data.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV RAFID</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

        <div class="left">
            <div class="profile-container">
                <img src="<?= $biodatas[4] ?>"  alt="">
                <h1><?= $biodatas[0] ?></h1>
                <div class="line"></div>
                <h3><?= $biodatas[5]?></h3>
            </div>
        </div>

        <div class="right">
            <div class="line-right">
                <div class="rounded"></div>
                <div class="rounded"></div>
                <div class="rounded"></div>
            </div>
            <div class="container-content">

                <div class="card">
                    <div class="content">
                        <h3>Profil Pribadi</h3>
                        <div class="line-card">

                        </div>
                        <div class="label">
                            <ul>
                                <li>Nama:</li>
                                <li>Tempat, Tanggal Lahir:</li>
                                <li>Alamat:</li>
                            </ul>
                        </div>
                        <div class="label-input">
                            <ul>
                                <li><?= $biodatas[0] ?></li>
                                <li><?= $biodatas[6] ?></li>
                                <li><?= $biodatas[1] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                

                <div class="card">
                    <div class="content">
                        <h3>Pendidikan</h3>
                        <div class="line-card">

                        </div>
                        <div class="label">
                            <ul>
                                <li><?= $studies[0]  ?></li>
                                <li><?= $studies[1]?></li>
                                <li><?= $studies[2]?></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                

                <div class="card">
                    <div class="content">
                        <h3>Kemampuan</h3>
                        <div class="line-card">

                        </div>
                        <div class="label">
                            <ul>
                            <li><?= $skills[0] ?></li>
                                <li><?= $skills[1] ?></li>
                                <li><?= $skills[2] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>