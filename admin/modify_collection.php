<?php
     session_start();
     require_once('../functions.php');
     notconnected();
    require_once('controllers/modify_collection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une collection</title>

    <!-- Style css-->
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/admin.css">

    <!-- Website logo -->
    <link rel="shortcut Icon" href="images/logo.png">

    <!-- Icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
</head>

<body>

    <div class="formulaire">
        <div class="formulaire-container">
            <h3>Modifier une collection</h3>
            <form action="" method='post' enctype="multipart/form-data">
                <div>
                    <input type="file" name='uploadfile'>
                    <input type="text" name='product-type' value='<?=$product_type_fetched?>'>
                    <select name="category" id="category">
                        <option value="select">selectionnez la catégorie</option>
                       <?php
                            $query = $db->prepare("SELECT * FROM categories_collection ORDER BY cat_id ASC");
                            $query->execute();
                            $trimesters = $query->fetchAll();
                            foreach ($trimesters as $trimester) {
                            ?>
                                <option value='<?= $trimester['cat_id'] ?>'> <?= $trimester['category_name'] ?> </option>
                            <?php    
                        }
                        ?>
                       </select>
                    <input class="submit" type="submit" name='modify' value="Enregistrer">
                </div>
            </form>
            <p style="color:red"><?=$error?></p></p>

        </div>
    </div>


</body>

</html>