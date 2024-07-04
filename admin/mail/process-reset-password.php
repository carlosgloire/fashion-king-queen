<?php

if(isset($_POST['reset'])){

    $token = $_POST["token"];

    $token_hash = hash("sha256", $token);
    
    $mysqli = require __DIR__ . "../database.php";
    
    $sql = "SELECT * FROM admins
            WHERE reset_token_hash = ?";
    
    $stmt = $mysqli->prepare($sql);
    
    $stmt->bind_param("s", $token_hash);
    
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    $user = $result->fetch_assoc();
    
    if ($user === null) {
        die("token not trouvé");
    }
    
    elseif (strtotime($user["reset_token_expires_at"]) <= time()) {
        die("token expiré va ecrire encore le ,ail");
    }
    elseif (empty($_POST["password"])  ||  empty($_POST["password_confirmation"])) {
        $error= "Veillez compléter tous les champs";
    }
    elseif (!preg_match("#[a-zA-Z]+#", $_POST['password']) ||
        !preg_match("#[0-9]+#", $_POST['password']) ||
        !preg_match("#[\!\@\#\$\%\^\&\*\(\)\_\+\-\=\[\]\{\}\;\:\'\"\,\<\>\.\?\/\`\~\\\|\ ]+#", $_POST['password'])) {
        $error = "Votre mot de passe doit contenir au moins une lettre, un chiffre et un caractère spécial.";
} 
        
    elseif ($_POST["password"] !== $_POST["password_confirmation"]) {
        $error= "Les deux mots de passe doivent correspondre";
    }else{
        $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
        $sql = "UPDATE admins
                SET password = ?,
                    reset_token_hash = NULL,
                    reset_token_expires_at = NULL
                WHERE admin_id = ?";
        
        $stmt = $mysqli->prepare($sql);
        
        $stmt->bind_param("ss", $password_hash, $user["admin_id"]);
        
        $stmt->execute();
        
          echo '<script>alert("Mot de passe mis à jour, vous pouvez maintenant vous connecter");</script>';
        echo '<script>window.location.href="../login.php";</script>';
        exit;
    }
    
    
}