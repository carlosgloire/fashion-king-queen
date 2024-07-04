<?php
    session_start();
    require_once('../functions.php');
    notconnected();
    logout();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Style css-->
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/admin.css">

    <!-- Website logo -->
    <link rel="shortcut Icon" href="../images/logo.png">

    <!-- Icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />

</head>

<body>

    <!-- Dasboard content -->
    <section>
        <form action="" method="post"><button title="Se deconnecter" name="logout" style="position: absolute;top:0;font-size:1.2rem;margin-top:30px;cursor:pointer" href="#" class="icons-link" ><i class="fa-solid fa-right-from-bracket" ></i></button></form>
        <div class="dashboard-content">
            <div>
                <a class="dashboard-item" href="produit.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span>Produits</span>
                </a>
            </div>
            <div>
                <a class="dashboard-item" href="testimonials.php">
                    <i class='bx bx-category'></i>
                    <span>Témoignage</span>
                </a>
            </div>
            <div>
                <a class="dashboard-item" href="gallery.php">
                    <i class='bx bx-photo-album'></i>
                    <span>Gallery</span>
                </a>
            </div>
            <div>
                <a class="dashboard-item" href="collection.php">
                    <i class='bx bx-collection'></i>
                    <span>Collection</span>
                </a>
            </div>
            <div>
                <a class="dashboard-item" href="newsletter.php">
                    <i class='bx bx-news'></i>
                    <span>News letter</span>
                </a>
            </div>
            <div>
                <a class="dashboard-item" href="background_images.php">
                    <i class='bx bx-photo-album'></i>
                    <span>background images</span>
                </a>
            </div>
        </div>
    </section>

</body>

</html>