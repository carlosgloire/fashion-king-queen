<?php
session_start();
require_once('../database/db.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/panier.css">
    <link rel="shortcut Icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <style>
        .panier-container {
            width: 80%;
            margin: auto;
            padding: 20px;
           
            border-radius: 10px;
    
        }

        .panier-container h3 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 1.5em;
        }
        tbody .produit{
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 20px;
       
        }
        .cart-table {
            width: 100%;
            border-collapse: collapse;
        }

        .cart-table th, .cart-table td {
            padding: 10px;
            text-align: center;
        }

        .cart-table th {
    
            font-weight: 700;
        }

        .cart-table td img {
            width: 100px;
            height: 100px;
        }

        .cart-table .product-info {
            text-align: left;
        }


        .cart-table .quantity input {
            width: 50px;
            text-align: center;
            margin: 0 5px;
            padding: 5px; /* Ajouter du padding pour une meilleure visibilité */
        }

        .cart-table .remove {
            cursor: pointer;
        }

        .cart-summary {
            text-align: right;
            margin-top: 10px;
        }

        .continue-shopping {
            display: block;
            width: fit-content;
            margin: 20px auto;
            padding: 10px 20px;
            background: #000;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
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
                <a href="produit.php"><i class='bx bx-pie-chart-alt-2'></i></a>
            </div>
            <div class="header-items">
                <p class="tooltip">Gallery</p>
                <a href="./gallery.html"><i class='bx bx-photo-album'></i></a>
            </div>
            <div class="header-items">
                <p class="tooltip">Collection</p>
                <a href="./collection.html"><i class='bx bx-collection'></i></a>
            </div>
        </div>
    </header>

    <div class="panier-home" data-aos="fade-up" data-aos-duration="3000">
        <div class="panier-container">
            <h3>Votre Panier</h3>
            <?php
            if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
                ?>
                <form action="update_cart.php" method="post">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th style="text-align: left;">Product</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $subtotal = 0;
                            foreach ($_SESSION['panier'] as $key => $item) {
                                // Récupérer les détails du produit depuis la base de données en utilisant l'ID du produit
                                $product_id = $item['product_id'];
                                $query = $db->prepare('SELECT * FROM produits WHERE product_id = ?');
                                $query->execute([$product_id]);
                                $produit = $query->fetch();

                                if ($produit) {
                                    $quantity = isset($item['quantity']) ? $item['quantity'] : 0;
                                    $total_price = $produit['prix'] * $quantity;
                                    $subtotal += $total_price;
                                    ?>
                                    
                                    <tr class="produit">
                                        <td class="product-info">
                                            <p><?=$produit['first_product']?></p>
                                            <img src="../admin/product_images/<?=$produit['photo']?>" alt="Image du produit">
                                            <br>
                                            <p>Prix: <?=$produit['prix']?>$</p>

                                        </td>
                                        <td><?=$produit['size']?></td>
                                        <td class="quantity">
                                            <input type="hidden" name="products[<?=$key?>][product_id]" value="<?=$product_id?>">
                                            <input type="number" name="products[<?=$key?>][quantity]" value="<?=$quantity?>" min="1">
                                        </td>
                                        <td><?=$total_price?>$</td>
                                        <td class="remove" onclick="removeFromCart(<?=$product_id?>)"><i class="fa-solid fa-trash"></i></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="cart-summary">
                        <p><strong>Prix total: <?=$subtotal?>$</strong></p>
                    </div>
                    <button type="submit" class="continue-shopping">Update Cart</button>
                </form>
                <?php
            } else {
                ?>
                <p style="text-align:center">Votre panier est vide.</p>
                <?php
            }
            ?>
        </div>
    </div>

    <footer class="paddings" data-aos="fade-up" data-aos-duration="3000">
        <h3>FASHION KING AND QUEEN</h3>
        <p>We push Goma first and up</p>
        <div class="media-sociaux">
            <a href="https://www.facebook.com/profile.php?id=100057406850129&mibextid=LQQJ4d"><i style="color: #0080f7;" class='bx bxl-facebook'></i></a>
            <a href="https://x.com/fashionking243?s=21"><i style="color: #000000;" class="fa-brands fa-x-twitter"></i></a>
            <a href="https://www.instagram.com/fashion_king_and_queen_243?igsh=M2d1cW5kOWhvZHdpZWVkZHB0Y2IyZA%3D%3D"><i style="color: #d62976;" class='bx bxl-instagram'></i></a>
            <a href="https://www.linkedin.com/in/fashion-king-and-queen-74338a26a"><i style="color: #0080f7;" class='bx bxl-linkedin'></i></a>
            <a href="https://youtube.com/@fashionkingqueen"><i style="color: #ff0000;" class='bx bxl-youtube'></i></a>
            <a href="#"><i style="color: #fff;" class='bx bxl-tiktok'></i></a>
            <a href="#"><i style="color: #000000;" class="fa-brands fa-whatsapp"></i></a>
            <a href="https://pin.it/4NHiBDX"><i style="color: #ff0000;" class='bx bxl-pinterest'></i></a>
        </div>
        <div class="copy">
            <small>&copy; 2023 Fashion. All Right Reserved</small>
        </div>
    </footer>

    <script>
        AOS.init();

        function removeFromCart(productId) {
            const form = document.createElement('form');
            form.method = 'post';
            form.action = 'remove_from_cart.php';
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'product_id';
            input.value = productId;
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    </script>
</body>

</html>