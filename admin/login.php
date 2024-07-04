<?php
    session_start();
    require_once('controllers/login.php');
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>

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

    <div class="formulaire">
        <div class="formulaire-container">
            <h3>Se connecter</h3>
            <form action="" method='post'>
                <div>
                    <input type="email" name='email' placeholder="Nom d'utilisateur">
                    <input type="password" name='password' placeholder="Votre mot de passe">
                    <input class="submit" type="submit" name='login' value="Connexion">
                    <a href="forgot_password.php">Mot de passe oublié? </a>
                </div>
            </form>
            <p style="color:red"><?=$error?></p></p>

        </div>
    </div>

</body>

</html>