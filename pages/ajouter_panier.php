<?php
session_start();
require_once('../database/db.php');

$product_id = $_POST['product_id'];

// Vérifiez si le panier existe dans la session, sinon initialisez-le
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Vérifiez si le produit existe déjà dans le panier
$found = false;
foreach ($_SESSION['panier'] as &$item) {
    if ($item['product_id'] == $product_id) {
        if (!isset($item['quantity'])) {
            $item['quantity'] = 0;
        }
        $item['quantity'] += 1;
        $found = true;
        break;
    }
}

// Si le produit n'est pas trouvé dans le panier, ajoutez-le avec une quantité de 1
if (!$found) {
    $_SESSION['panier'][] = ['product_id' => $product_id, 'quantity' => 1];
}

// Redirigez vers la page du panier
header('Location: produit.php');
exit;
?>
