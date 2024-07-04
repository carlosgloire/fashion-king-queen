<?php require_once('../database/db.php')?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/gallery.css">
    <link rel="shortcut Icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
</head>

<body>
    <header>
        <div class="header-content">
            <div class="header-items">
                <p class="tooltip">Accueil</p>
                <a class="icon" href="../index.php"><i class='bx bx-home-alt'></i></a>
            </div>
            <div class="header-items">
                <p class="tooltip">Produits</p>
                <a href="./produit.html"><i class='bx bx-pie-chart-alt-2'></i></a>
            </div>
            <div class="header-items">
                <p class="tooltip">Gallery</p>
                <a href="#"><i class='bx bx-photo-album' ></i></a>
            </div>
            <div class="header-items">
                <p class="tooltip">Collection</p>
                <a href="./collection.php"><i class='bx bx-collection'></i></a>
            </div>
        </div>
    </header>

    <div class="product-home" data-aos="fade-up" data-aos-duration="3000">
        <div class="product-container">
            <h3>Notre gallery</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, numquam voluptatum. Natus temporibus voluptatum sapiente voluptates recusandae quod.</p>
        </div>
    </div>

    <div class="gallery paddings">
        <div class="gallery-container" data-aos="fade-up" data-aos-duration="3000">
            <?php
                $query = $db->prepare('SELECT * FROM images_gallerie');
                $query->execute();
                $images = $query->fetchAll();
                if($images){
                    foreach($images as $image){
                        ?> <p><img src="../admin/gallerie_images/<?=$image['photo']?>" alt=""></p><?php
                    }
                }else{
                    ?><div style="color:red"><?='Pas des des images dans la gallerie'?></div><?php
                }
            ?>
        </div>
    </div>

    <footer class="paddings" data-aos="fade-up" data-aos-duration="3000">
        <h3>FASHION KING AND QUEEN</h3>
        <p>We push Goma first and up</p>
        <div class="media-sociaux">
            <a href="https://www.facebook.com/profile.php?id=100057406850129&mibextid=LQQJ4d"><i style="color: #0080f7"; class='bx bxl-facebook' ></i></a>
            <a href="https://x.com/fashionking243?s=21"><i style="color: #000000;" class="fa-brands fa-x-twitter"></i></a>
            <a href="https://www.instagram.com/fashion_king_and_queen_243?igsh=M2d1cW5kOWhvZHdp&utm_source=qr"><i style="color: #dd2a7b;" class='bx bxl-instagram' ></i></a>
            <a href="https://www.tiktok.com/@fashionkingandqueen01?_t=8mBZFTiohMr&_r=1"><i style="color: #000000;" class='bx bxl-tiktok'></i></a>
            <a href="https://wa.me/message/MK656QTSUPGUF1"><i style="color: #41d251;" class='bx bxl-whatsapp' ></i></a>
            <a href="https://www.threads.net/@fashion_king_and_queen_243"><i style="color: #000000;" class="fa-brands fa-threads"></i></a>
            <a href="https://www.linkedin.com/in/fashion-king-and-queen-a675852a9?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app"><i style="color: #1DA1F2;" class='bx bxl-linkedin' ></i></a>
        </div>
        <div style="font-size: 14px; margin-top: 20px;">
            <p>© 2024 <span style="color: #000; font-weight: 700;">Fashion King and Queen.</span> All rights reserved. <br>Developed with ❤️ and ☕ by <a href="www.nguvutech.com">NGUVU TECH</a></p>
        </div>
    </footer>
    <script>
        AOS.init();
    </script>
</body>

</html>