<?php
require_once('../database/db.php');

// Fetch categories and their associated products
$categories_query = $db->query("SELECT c.cat_id, c.category_name, p.photo, p.product_type, p.coll_id, c.description
                                FROM categories_collection c 
                                LEFT JOIN collections p ON c.cat_id = p.cat_id 
                                WHERE p.photo IS NOT NULL
                                ORDER BY c.category_name, p.product_type");
$categories = [];
while ($row = $categories_query->fetch(PDO::FETCH_ASSOC)) {
    $categories[$row['cat_id']]['category_name'] = $row['category_name'];
    $categories[$row['cat_id']]['description'] = $row['description'];
    if (!empty($row['photo'])) {
        $categories[$row['cat_id']]['products'][] = [
            'photo' => $row['photo'],
            'product_type' => $row['product_type'],
            'coll_id' => $row['coll_id']
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/collection.css">
    <link rel="shortcut Icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collection</title>
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
                <a href="./produit.php"><i class='bx bx-pie-chart-alt-2'></i></a>
            </div>
            <div class="header-items">
                <p class="tooltip">Gallery</p>
                <a href="./gallery.php"><i class='bx bx-photo-album'></i></a>
            </div>
            <div class="header-items">
                <p class="tooltip">Collection</p>
                <a href="#"><i class='bx bx-collection'></i></a>
            </div>
        </div>
    </header>

    <div class="blog-home" data-aos="fade-up" data-aos-duration="3000">
        <div class="home-item">
            <h3>Collection</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, numquam voluptatum. Natus temporibus voluptatum sapiente voluptates recusandae quod.</p>
        </div>
    </div>

    <div class="collection-page paddings">
        <div class="collection-bloc">

            <?php foreach ($categories as $cat_id => $category): ?>
                <?php if (!empty($category['products'])): ?>
                    <div class="top-lines">
                        <h1></h1>
                        <h2></h2>
                    </div>
                    <div class="first-class-text">
                        <h3><?php echo htmlspecialchars($category['category_name']); ?></h3>
                        <p><?php echo htmlspecialchars($category['description']); ?></p>
                    </div>
                    <div  style="display: flex; gap:20px ;justify-content:center;flex-wrap:wrap">
                        <?php foreach ($category['products'] as $collection): ?>
                            <?php $collection_id= $collection['coll_id'] ?>
                    
                                <div class="collection-item">
                                    <div>
                                        <p><img src="../admin/collection_images/<?= htmlspecialchars($collection['photo']) ?>" alt=""></p>
                                    </div>
                                    <?php
                                        $sql = 'SELECT AVG(rating) as avg_rating FROM reviews WHERE coll_id = ?';
                                        $stmt = $db->prepare($sql);
                                        $stmt->execute([$collection_id]);
                                        $result = $stmt->fetch();
                                        $avg_rating = round($result['avg_rating'], 1);
                                        ?>
                                        
                                            <div class="stars">
                                                <?php
                                                for ($i = 1; $i <= 5; $i++) {
                                                    echo $i <= $avg_rating ? "<i class='bx bxs-star'></i>" : '<i class="fa-regular fa-star"></i>';
                                                }
                                                ?>
                                                <span style="color: black;color: gray">(<?php echo $avg_rating; ?>)</span>
                                            </div>
                                            
                                        <?php
                                    ?>
                                    <div class="collection-text">
                                        <a href="../reviews/review.html?coll_id=<?=$collection['coll_id']?>" style="color: black; font-size:0.8rem">Cliquez  pour laisser un avis</a>
                                        <p><?= htmlspecialchars($collection['product_type']) ?></p>
                                        <strong>Nouvelle collection</strong>
                                    </div>

                                </div>
                                
                        <?php endforeach; ?>
                   </div>  
                <?php endif; ?>
            <?php endforeach; ?>
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
