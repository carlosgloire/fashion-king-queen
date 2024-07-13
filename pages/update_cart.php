<?php
session_start();

if (isset($_POST['products']) && is_array($_POST['products'])) {
    foreach ($_POST['products'] as $product) {
        $product_id = $product['product_id'];
        $quantity = $product['quantity'];

        // Parcourir le panier et trouver l'élément à mettre à jour
        foreach ($_SESSION['panier'] as $key => $item) {
            if ($item['product_id'] == $product_id) {
                // Mettre à jour la quantité de l'élément
                $_SESSION['panier'][$key]['quantity'] = $quantity;
                break;
            }
        }
    }
}

// Rediriger vers la page du panier
header('Location: panier.php');
exit;
?>
