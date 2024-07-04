<?php 
    session_start();
    require_once('../functions.php');
    notconnected();
    require_once('controllers/add_product.php')

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter produit</title>

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
            <h3>Ajouter un produit</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <input type="file" name='uploadfile'>
                    <input type="text" name="product_name" placeholder="Type de produit">
                    <input type="number" name="prix" placeholder="Prix">
                    <textarea name="description" placeholder="Descriptions"></textarea>
                    <input class="submit" type="submit" name="add" value="Enregistrer">
                    <p style="color:red"><?=$error?></p><p style="color: green;"><?=$success?></p>
                </div>
            </form>
        </div>
    </div>


</body>

</html>