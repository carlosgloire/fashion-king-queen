<?php require_once('../database/db.php')?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/product.css">
    <link rel="shortcut Icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
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
                <a href="#"><i class='bx bx-pie-chart-alt-2'></i></a>
            </div>
            <div class="header-items">
                <p class="tooltip">Gallery</p>
                <a href="./gallery.html"><i class='bx bx-photo-album' ></i></a>
            </div>
            <div class="header-items">
                <p class="tooltip">Collection</p>
                <a href="./collection.html"><i class='bx bx-collection'></i></a>
            </div>
        </div>
    </header>

    <div class="product-home" data-aos="fade-up" data-aos-duration="3000">
        <div class="product-container">
            <h3>Nos produits</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, numquam voluptatum. Natus temporibus voluptatum sapiente voluptates recusandae quod.</p>
        </div>
    </div>

    <div class="prod-part paddings">
        <?php
            $query = $db->prepare('SELECT * FROM produits');
            $query->execute();
            $produits = $query->fetchAll();
            if(!$produits){
                ?><div style="color:red"><?='Pas de collection disponible encore'?></div><?php
            }else{
                foreach($produits as $produit){
                    $product_id= $produit['product_id']
                ?>
                     <div  class="prod-part-container">
                        <div class="top-lines">
                            <h1></h1>
                            <h2></h2>
                        </div>
                        <div class="prod-part-item" data-aos="fade-up" data-aos-duration="3000">
                            <div class="prod-first-bloc">
                                <p><img class="main-image" src="../admin/product_images/<?=$produit['photo']?>" alt="image product"></p>
                                <div style="display:flex; flex-wrap: wrap;">
                                    <p style="width: 95px;height:115px;cursor:pointer"><img class="small-image" src="../admin/product_images/<?=$produit['photo']?>" alt="image product" ></p>
                                    <?php
                                        $query = $db->prepare("SELECT photo FROM petites_images WHERE product_id=$product_id");
                                        $query->execute();
                                        if($query->rowCount()>0){
                                            while($images = $query->fetch(PDO::FETCH_ASSOC)){
                                            ?>
                                                <p style="width: 95px;height:115px;cursor:pointer"><img class="small-image" src="../admin/petites_images/<?=$images['photo']?>" alt="image product"></p>
                                            <?php
                                            }
  
                                        }

                                    ?>

                                </div>
                            </div>
                            <div class="prod-second-bloc">
                                <h3><?=$produit['first_product']?></h3>
                                <?php
                                    $sql = 'SELECT AVG(rating) as avg_rating FROM reviews_produits WHERE product_id = ?';
                                    $stmt = $db->prepare($sql);
                                    $stmt->execute([$product_id]);
                                    $result = $stmt->fetch();
                                    $avg_rating = round($result['avg_rating'], 1);
                                    ?>
                                    
                                        <div class="stars" >
                                            <?php
                                            for ($i = 1; $i <= 5; $i++) {
                                                echo $i <= $avg_rating ? "<i class='bx bxs-star'></i>" : '<i class="fa-regular fa-star" ></i>';
                                            }
                                            ?>
                                            <span style="color: black;color: gray">(<?php echo $avg_rating; ?>)</span>
                                        </div>
                                        
                                    <?php
                                ?>
                                <a href="../reviews/product_review.html?product_id=<?=$product_id?>" style="color: black; font-size:0.8rem">Cliquez  pour laisser un avis</a> 
                                <div class="price">
                                    <span>Couleurs: <?=$produit['couleur']?></span>
                                    <span>Sizes: <?=$produit['size']?>$</span>
                                    <span>Prix: <?=$produit['prix']?>$</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, qui? Quo, pariatur eos eligendi consectetur accusamus odio esse autem enim quisquam dicta modi, earum nam! Officiis explicabo error sunt earum ab veniam, expedita inventore.
                                    Fugit amet pariatur nulla. Voluptatum, deleniti!</p>
                                <span>Nous faisons la livraison de nos produits à domicile</span>
                            </div>

                        </div>
                    </div>
    
                <?php
                }
            }
        ?>
        <div class="command">
            <h4>Passez vos commandes</h4>
            <form action="command.php" method='post' data-aos="fade-up" data-aos-duration="3000" class="aos-init aos-animate">
                <div class="identity">
                    <input type="text" name='nom' placeholder="Votre nom" value="<?=isset($_POST['nom'])?isset($_POST['nom']):''?>">
                    <input type="email" name="email" placeholder="Votre address email" value="<?=isset($_POST['email'])?isset($_POST['email']):''?>">
                </div>
                <div>
                    <input type="text" name="choice" placeholder="Votre choix..,Ex:Cagoule,t-shirt..." value="<?=isset($_POST['choice'])?isset($_POST['choice']):''?>">
                    <input type="text" name="size" placeholder="Votre size..,Ex:S,M,L,X,XL,2XL..." value="<?=isset($_POST['size'])?isset($_POST['size']):''?>">
                    <input type="text" name="color" placeholder="Couleurs..,Ex:Blanc,Noir,Bleu" value="<?=isset($_POST['color'])?isset($_POST['color']):''?>">
                </div>
                <div>
                    <input type="text" name="quantite" placeholder="#1, 2, 3, 4, Quantité" value="<?=isset($_POST['quantite'])?isset($_POST['quantite']):''?>">
                    <input type="text" name="addresse" placeholder="Votre addresse" value="<?=isset($_POST['addresse'])?isset($_POST['addresse']):''?>">
                    <input type="text" name="phone" placeholder="Votre numéro de télephone" value="<?=isset($_POST['addresse'])?isset($_POST['addresse']):''?>">

                </div>
                <div class="send">
                    <input class="send-request" name="send" type="submit" value="Envoyer la requête">
                </div>
            </form>
        </div>
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

    <script src="../javascript/prod.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>