<?php
require_once('contactez-nous/database.php');

if(isset($_POST['send-NewsLetter'])){
    if(empty($_POST['mail-newsLetter'])){
        echo '<script>alert("Veillez completer votre mail");</script>';
        echo '<script>window.location.href="../";</script>';
        exit;
    } else {
        $email = $_POST['mail-newsLetter'];
        $req = $mysqli->prepare('SELECT * FROM mailNewsletter WHERE email = ?');
        $req->bind_param('s', $email);
        $req->execute();
        $result = $req->get_result();

        if ($result->num_rows > 0) {
            echo '<script>alert("Cet email existe déjà ");</script>';
            echo '<script>window.location.href="../";</script>';
            exit;
        } else {
            $query = $mysqli->prepare('INSERT INTO mailNewsletter (email) VALUES (?)');
            $query->bind_param('s', $email);
            $query->execute();
            echo '<script>alert("Votre mail a été enregistré pour recevoir les informations concernant nos produits");</script>';
            echo '<script>window.location.href="../";</script>';
            exit;
        }
    }
}
