<?php
 
$error=null;
require_once('process-reset-password.php');
$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$mysqli = require('../mail/database.php');

$sql = "SELECT * FROM admins
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    echo '<script>alert("Token not trouvé");</script>';
    echo '<script>window.location.href="../forgot-password.php";</script>';
    exit;
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    echo '<script>alert("Le token a expiré veillez encore entrer le mail");</script>';
    echo '<script>window.location.href="../forgot-password.php";</script>';
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du mot de passe</title>

    <!-- Style css-->
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/admin.css">

    <!-- Website logo -->
    <link rel="shortcut Icon" href="../../images/logo.png">

    <!-- Icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
</head>

<body>

    <div class="formulaire">
        <div class="formulaire-container">
            <h3>Réinitialiser </h3>
            <form action="" method='post'>
                <div>
                    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                    <input type="password" name='password' placeholder="Ecrivez le mot de passe">
                    <input type="password" name='password_confirmation' placeholder="Confirmez le mot de passe">
                    <input class="submit" type="submit" name='reset' value="Réinitialiser">
                </div>
            </form>
            <p style="color:red"><?=$error?></p></p>

        </div>
    </div>

</body>

</html>