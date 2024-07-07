<?php
require_once('database/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut Icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion king & queen</title>
</head>

<body>
    <header>
        <div class="header-content">
            <div class="header-items">
                <p class="tooltip">Accueil</p>
                <a class="icon" href="#"><i class='bx bx-home-alt'></i></a>
            </div>
            <div class="header-items">
                <p class="tooltip">Nous</p>
                <a href="#about"><i class='bx bx-certification' ></i></a>
            </div>
            <div class="header-items">
                <p class="tooltip">Produits</p>
                <a href="#product"><i class='bx bx-pie-chart-alt-2'></i></a>
            </div>
            <div class="header-items">
                <p class="tooltip">Collection</p>
                <a href="#collection"><i class='bx bx-collection'></i></a>
            </div>
            <div class="header-items">
                <p class="tooltip">Contact</p>
                <a href="#contact"><i class='bx bx-phone-call'></i></a>
            </div>
        </div>
    </header>

    <section>
        <div class="home-page" data-aos="fade-up" data-aos-duration="3000">
            <div class="home-items">
                <div class="container paddings">
                    <img src="../images/logo.png" alt="">
                    <h2>Fashion King and Queen</h2>
                    <p><i class='bx bxs-quote-alt-left'></i> Bienvenue dans l'univers majestueux de notre marque où le luxe et l'élégance se rencontrent pour créer des vêtements dignes des plus grands monarques. </p>
                    <p>Parcourez notre royaume de la mode et laissez-vous envoûter par la magie de la marque FASHION KING AND QUEEN.</p>
                </div>
            </div>
        </div>

        <div class="about-us paddings">
            <div id="about" class="about-us-container">
                <div class="about-us-first-bloc">
                    <h3>A propos</h3>
                </div>
                <div class="about-us-second-bloc">

                    <div class="bloc-items" data-aos="fade-up" data-aos-duration="3000">
                        <div>
                            <p></p>
                            <span>01</span>
                        </div>
                        <p><i class='bx bxs-quote-alt-left'></i> FASHION KING AND QUEEN a été fondée en octobre 2020 par trois jeunes de Goma, R.D Congo. Inspirés par l'histoire royale, nous croyons que la jeunesse doit incarner des valeurs nobles pour servir
                            et inspirer sa communauté. Notre passion pour la mode nous a conduits à créer des vêtements à l'élégance royale, d'où notre nom.</p>
                    </div>

                    <div class="bloc-items" data-aos="fade-up" data-aos-duration="3000">
                        <div>
                            <p></p>
                            <span>02</span>
                        </div>
                        <p>Ça reste un pas d’avance de porter nos collections car elles reflètent des messages importants et c’est une grande fierté pour vous d’être le porteur des messages qui contribuent à votre évolution, celle de la société et du monde
                            entier.Chaque pièce que nous créons est le fruit du travail passionné de nos artisans locaux.</p>
                    </div>

                    <div class="bloc-items" data-aos="fade-up" data-aos-duration="3000">
                        <div>
                            <p></p>
                            <span>03</span>
                        </div>
                        <p>La marque FASHION KING AND QUEEN incarne l'élégance et la grandeur, invitant chacun à se sentir comme un roi ou une reine dans ses vêtements. En tant que marque engagée, nous soutenons activement des causes sociales et environnementales
                            qui nous tiennent à cœur, car nous croyons en un monde plus juste et plus durable pour tous.</p>
                    </div>

                    <div class="bloc-items" data-aos="fade-up" data-aos-duration="3000">
                        <div>
                            <p></p>
                            <span>04</span>
                        </div>
                        <p>FASHION KING AND QUEEN qui au départ, était la marque seulement portée à Goma, aujourd'hui nous faisons voyager cette marque originaire du Congo RDC 🇨🇩 sur le plan national et internationl dans différents pays comme le Rwanda
                            🇷🇼, le Burundi 🇧🇮, Kenya 🇰🇪, Ouganda 🇺🇬, Algérie 🇩🇿, Canada 🇨🇦, France 🇫🇷, Chypre 🇨🇾, E.A.U (Dubai) 🇦🇪, Etats-Unis 🇺🇸, Turquie 🇹🇷, Etc.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="goal paddings">
            <div class="goal-items">
                <div>
                    <div class="choose-us-title" data-aos="fade-up" data-aos-duration="3000">
                        <h5></h5>
                        <h3>Notre objectif</h3>
                        <h5></h5>
                    </div>
                    <p data-aos="fade-up" data-aos-duration="3000">L'objectif précis de FASHION KING AND QUEEN est de promouvoir l'estime de soi et la confiance en soi à travers nos vêtements. Nous croyons que lorsque les gens se sentent bien dans leur peau et dans leurs vêtements, ils sont plus susceptibles
                        de réussir dans tous les aspects de leur vie. En encourageant nos clients à se sentir comme des rois et des reines, nous espérons inspirer un sentiment de fierté et d'assurance qui se reflétera dans leurs actions et interactions
                        avec les autres.</p>
                </div>
            </div>
        </div>

        <div class="wrapper" data-aos="fade-up" data-aos-duration="3000">
            <div class="wrapper-container paddings">
                <div class="counter">
                    <span class="num" data-val="5">000</span>
                    <p>Expérience</p>
                </div>
                <div class="counter">
                    <span class="num" data-val="284">000</span>
                    <p>Commandes</p>
                </div>
                <div class="counter">
                    <span class="num" data-val="233">000</span>
                    <p>Clients satisfait</p>
                </div>
            </div>
        </div>

        <div class="choose-us paddings">
            <div class="choose-us-title">
                <h5></h5>
                <h3>Pourquoi nous choisir?</h3>
                <h5></h5>
            </div>
            <div class="choose-us-container">
                <div class="choose-us-items">
                    <div class="top-lines">
                        <h1></h1>
                        <h2></h2>
                    </div>
                    <div class="choose-us-containt" data-aos="fade-up" data-aos-duration="3000">
                        <i class='bx bx-bar-chart-alt-2'></i>
                        <div>
                            <strong>Un pas vers l'évolution et le changement</strong>
                            <p>Portez nos collections avec fierté : elles véhiculent des messages essentiels pour votre évolution et celle du monde. Soyez le symbole du changement positif.</p>
                        </div>
                    </div>
                </div>
                <div class="choose-us-items">
                    <div class="top-lines">
                        <h1></h1>
                        <h2></h2>
                    </div>
                    <div class="choose-us-containt" data-aos="fade-up" data-aos-duration="3000">
                        <i class='bx bx-book-heart'></i>
                        <div>
                            <strong>La beauté de nos créations</strong>
                            <p>Chez FASHION KING AND QUEEN, nous célébrons la puissance de l'artisanat local et la beauté de la diversité. Chaque pièce est une œuvre passionnée de nos talentueux artisans, dédiée à enrichir nos collections.</p>
                        </div>
                    </div>
                </div>
                <div class="choose-us-items">
                    <div class="top-lines">
                        <h1></h1>
                        <h2></h2>
                    </div>
                    <div class="choose-us-containt" data-aos="fade-up" data-aos-duration="3000">
                        <i class='bx bx-globe-alt'></i>
                        <div>
                            <strong>Notre engagement pour un monde meilleur</strong>
                            <p>Nous sommes fiers de promouvoir des pratiques durables tout au long de notre chaîne de production, en veillant à minimiser notre impact sur l'environnement.</p>
                        </div>
                    </div>
                </div>
                <div class="choose-us-items">
                    <div class="top-lines">
                        <h1></h1>
                        <h2></h2>
                    </div>
                    <div class="choose-us-containt" data-aos="fade-up" data-aos-duration="3000">
                        <i class='bx bx-group'></i>
                        <div>
                            <strong>Ensemble pour un avenir juste</strong>
                            <p>En tant que marque engagée, nous soutenons activement des causes sociales et environnementales qui nous tiennent à cœur, car nous croyons en un monde plus juste et plus durable pour tous.</p>
                        </div>
                    </div>
                </div>
                <div class="choose-us-items">
                    <div class="top-lines">
                        <h1></h1>
                        <h2></h2>
                    </div>
                    <div class="choose-us-containt" data-aos="fade-up" data-aos-duration="3000">
                        <i class="fa-solid fa-child-reaching"></i>
                        <div>
                            <strong>Célébrez la diversité et préservons les traditions</strong>
                            <p>Rejoignez-nous pour célébrer la diversité, préserver les traditions artisanales et faire une différence positive. Ensemble, créons un avenir meilleur à travers la mode.</p>
                        </div>
                    </div>
                </div>
                <div class="choose-us-items">
                    <div class="top-lines">
                        <h1></h1>
                        <h2></h2>
                    </div>
                    <div class="choose-us-containt" data-aos="fade-up" data-aos-duration="3000">
                        <i class="fa-solid fa-person-running"></i>
                        <div>
                            <strong>Rejoignez notre mission pour un avenir durable</strong>
                            <p>Ce témoignage illustre l'engagement de notre marque royale envers ses valeurs sociales et environnementales. Rejoignez-nous pour un impact positif sur la société et l'industrie de la mode.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="product" class="products paddings">
            <div class="choose-us-title">
                <h5></h5>
                <h3>Nos produits</h3>
                <h5></h5>
            </div>
            <div class="product-item" data-aos="fade-up" data-aos-duration="3000">
                <?php
                    $query=$db->prepare('SELECT * FROM produits LIMIT 4');
                    $query->execute();
                    $products = $query->fetchAll();
                    if(!$products){
                        ?><div style="color:red"><?='Pas de collection disponible encore'?></div><?php
                    }else{
                        foreach($products as $product){
                            $product_id= $product['product_id']
                            ?>
                                <div class="prod-details">
                                    <p><img src="admin/product_images/<?=$product['photo']?>" alt=""></p>
                                    <div>
                                        <strong><?=$product['first_product']?></strong>
                                        <?php
                                                $sql = 'SELECT AVG(rating) as avg_rating FROM reviews_produits WHERE product_id = ?';
                                                $stmt = $db->prepare($sql);
                                                $stmt->execute([$product_id]);
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
                                        <a href="reviews/product_review.html?product_id=<?=$product['product_id']?>" style="color: black; font-size:0.8rem">Cliquez  pour laisser un avis</a>    
                                        <h4 style="font-weight: bold;border-bottom:none;margin-bottom:0px"><?=$product['prix']?>$</h4>
                                    </div>
                                </div>
                            <?php
                        }
                    }

                ?>
            </div>
            <div class="see-details">
                <a href="./pages/produit.php">Voir en détail</a>
                <i class='bx bx-right-arrow-alt'></i>
            </div>

        </div>

        <div class="newsletter">
            <div class="newsletter-items paddings">
                <div data-aos="fade-up" data-aos-duration="3000">
                    <h5>Abonnez-vous à la Newletter</h5>
                    <p>Inscrivez-vous pour ne manquer aucune information concernant nos produits."</p>
                </div>
                <div data-aos="fade-up" data-aos-duration="3000">
                    <form action="pages/news-letter.php" method="post">
                        <input class="news-input" type="email" name="mail-newsLetter" placeholder="Votre email">
                        <button class="send" name='send-NewsLetter'>Envoyer</button>
                    </form>
                </div>
            </div>
        </div>

        <div id="collection" class="collection paddings">
            <div class="choose-us-title">
                <h5></h5>
                <h3>Nos collections</h3>
                <h5></h5>
            </div>

            <div class="collection-container" data-aos="fade-up" data-aos-duration="3000">
                
                <?php
                    $query= $db->prepare('SELECT * FROM collections LIMIT 4');
                    $query->execute();
                    $collections = $query->fetchAll();
                    if(!$collections){
                        ?><div style="color:red"><?='Pas de collection disponible encore'?></div><?php
                    }else{
                        foreach($collections as $collection){
                            $collection_id= $collection['coll_id']
                            ?>                  
                            <div class="collection-item">
                                <div>
                                    <p><img src="./admin/collection_images/<?= $collection['photo']?>" alt=""></p>
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
                                    <a href="reviews/review.html?coll_id=<?=$collection['coll_id']?>" style="color: black; font-size:0.8rem">Cliquez  pour laisser un avis</a>
                                    <p><?=$collection['product_type']?></p>
                                    <strong>Nouvelle collection</strong>
                                </div>

                            </div>
                            <?php
                        }
                    }

                ?>

            </div>

            <div class="see-details">
                <a href="./pages/collection.php">Voir plus</a>
                <i class='bx bx-right-arrow-alt'></i>
            </div>
        </div>
        <?php

            $query = $db->prepare("SELECT * FROM testimonials");
            $query->execute();
            $testimonials = $query->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class="testimonial paddings">
            <div class="choose-us-title">
                <h5></h5>
                <h3>Témoignage</h3>
                <h5></h5>
            </div>
            <div class="testimonial-content" data-aos="fade-up" data-aos-duration="3000">
                <?php foreach ($testimonials as $testimonial): ?>
                <div class="testimonial-item">
                    <p><img src="admin/images_temoignages/<?=$testimonial['photo']?>" alt=""></p>
                    <div>
                        <p><i class='bx bxs-quote-alt-left'></i> <?= nl2br(html_entity_decode($testimonial['message'])) ?> <i class='bx bxs-quote-alt-right'></i></p>
                        <h5><?=  html_entity_decode($testimonial['name'])?></h5>
                        <span><?= html_entity_decode($testimonial['role']); ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="test-btn">
                <?php for ($i = 0; $i < count($testimonials); $i++): ?>
                <div class="circle <?= $i === 0 ? 'active' : ''; ?>"></div>
                <?php endfor; ?>
            </div>
        </div>


        <div id="contact" class="contact-us paddings" data-aos="fade-up" data-aos-duration="3000">
            <div class="choose-us-title">
                <h5></h5>
                <h3>Contactez-nous</h3>
                <h5></h5>
            </div>
            <div class="contact-container">
                <div class="bloc-contact">
                    <div class="items">
                        <i style="color: #dd2a7b;" class='bx bx-current-location'></i>
                        <div>
                            <h5>Address</h5>
                            <p>Goma, DRC</p>
                        </div>
                    </div>
                    <div class="items">
                        <i style="color: #1DA1F2;" class='bx bx-envelope'></i>
                        <div>
                            <h5>Email</h5>
                            <p>fashionlingqueen@gmail.com</p>
                        </div>
                    </div>
                    <div class="items">
                        <i style="color:#41d251;" class='bx bx-phone-call'></i>
                        <div>
                            <h5>Call</h5>
                            <p>+243 123 456 789</p>
                        </div>
                    </div>
                </div>
                <div class="contact-form">
                    <form action="pages/contactez-nous/contactez-nous.php" method="post">
                        <div class="form-input">
                            <input type="text" name="noms" placeholder="Entre vos noms">
                            <input type="email" name="email" placeholder="Saisissez votre mail">
                        </div>
                        <div>
                            <input type="text" name="subject" placeholder="Sujet du message...">
                        </div>
                        <div>
                            <textarea name="message" id="" cols="10" rows="5" placeholder="Veillez écrire votre message ici"></textarea>
                        </div>
                        <div class="submit">
                            <button type="submit" name="send">Envoyer le message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
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
            <p>© 2024 <span style="color: #000; font-weight: 700;">Fashion King and Queen.</span> All rights reserved. <br>Developed with ❤️ and ☕ by <a href="https://www.nguvutech.com/">NGUVU TECH</a></p>
        </div>
    </footer>


    <script src="javascript/app.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>