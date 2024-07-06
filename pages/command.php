<?php
$error = null;
$success = null;
$mysqli = require(__DIR__ . "/contactez-nous/database.php"); 
require_once('../database/db.php');

if (isset($_POST['send'])) {
    if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['choice']) && isset($_POST['size']) && isset($_POST['color']) && isset($_POST['quantite']) && isset($_POST['addresse'])) {
        $subject = "Commande d'un produit";
        $noms = htmlspecialchars($_POST['nom']);
        $sender_email = htmlspecialchars($_POST['email']);
        $choice = htmlspecialchars($_POST['choice']);
        $size= htmlspecialchars($_POST['size']);
        $color = htmlspecialchars($_POST['color']);
        $quantite= htmlspecialchars($_POST['quantite']);
        $addresse = htmlspecialchars($_POST['addresse']);
        if (empty($noms) || empty($sender_email) || empty($choice) || empty($size) || empty($color) || empty($quantite) || empty($addresse)) {
            echo '<script>alert("Veuillez compléter tous les champs");</script>';
            echo '<script>window.location.href="produit.php";</script>';
            exit;
        } else {
            // Check if the command already exists
            $checkQuery = $db->prepare('SELECT * FROM commands WHERE nom = :nom AND email = :email AND choix = :choix AND size = :size AND couleur = :couleur AND quantite = :quantite AND addresse = :addresse');
            $checkQuery->bindParam(':nom', $noms);
            $checkQuery->bindParam(':email', $sender_email);
            $checkQuery->bindParam(':choix', $choice);
            $checkQuery->bindParam(':size', $size);
            $checkQuery->bindParam(':couleur', $color);
            $checkQuery->bindParam(':quantite', $quantite);
            $checkQuery->bindParam(':addresse', $addresse);
            $checkQuery->execute();
            if ($checkQuery->rowCount() > 0) {
                echo '<script>alert("Cette commande existe déjà, veuillez passer une autre commande différente de celle-là.");</script>';
                echo '<script>window.location.href="produit.php";</script>';
                exit;
            } else {
                $query = $db->prepare('INSERT INTO commands (nom,email,choix,size,couleur,quantite,addresse) VALUES (:nom,:email,:choix,:size,:couleur,:quantite,:addresse)');
                $query->bindParam(':nom', $noms);
                $query->bindParam(':email', $sender_email);
                $query->bindParam(':choix', $choice);
                $query->bindParam(':size', $size);
                $query->bindParam(':couleur', $color);
                $query->bindParam(':quantite', $quantite);
                $query->bindParam(':addresse', $addresse); // Corrected line
                $query->execute();
                $mail = require __DIR__ . "/contactez-nous/mailer.php";
                $mail->setFrom($sender_email, 'FASHION STYLE/COMMANDES'); // Set sender to the email entered in the form
                $mail->Subject = html_entity_decode($subject); // Decode HTML entities in subject
                $mail->CharSet = 'UTF-8'; // Set charset to UTF-8

                // Create the email body with the message from the textarea
                $email_body = <<<END
                <html>
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f5f5f5;
                            padding: 20px;
                        }
                        .container {
                            background-color: #fff;
                            padding: 30px;
                            border-radius: 8px;
                            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                            white-space: pre-wrap; /* Preserve white space and line breaks */
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <p><strong>Nom: </strong> $noms</p>
                        <p><strong>Email: </strong> $sender_email</p>
                        <p><strong>Choix: </strong>$choice</p>
                        <p><strong>Sizes: </strong>$size</p>
                        <p><strong>Couleurs: </strong>$color</p>
                        <p><strong>Quantité: </strong>$quantite</p>
                        <p><strong>Adresse: </strong>$addresse</p>
                    </div>
                </body>
                </html>
                END;

                $mail->Body = $email_body;
                $mail->isHTML(true);
                
                // Set the recipient to the admin email
                $mail->addAddress('ndayisabarenzaho@gmail.com', 'Admin'); // Adresse email de l'admin

                try {
                    $mail->send();

                    echo '<script>alert("Votre message a été envoyé avec succès, vous serez répondu via votre mail");</script>';
                    echo '<script>window.location.href="../";</script>';
                    exit;

                } catch (Exception $e) {
                    echo "<script>alert('Le message n'a été envoyé ');</script>";
                    echo '<script>window.location.href="../";</script>';
                    exit;
                }
            }
        }
    }
}
?>
