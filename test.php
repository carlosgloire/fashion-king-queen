<?php
session_start();

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fashion-style";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add product to cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }
}

// Clear the cart
if (isset($_POST['clear_cart'])) {
    $_SESSION['cart'] = [];
}

// Get cart contents
$cart_count = array_sum($_SESSION['cart']);
$cart_contents = $_SESSION['cart'];

// Fetch products from the database
$sql = "SELECT product_id, photo, first_product, description, prix, couleur, size FROM produits";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <title>Shopping Cart</title>
    <style>
        .product {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            flex: 1 1 200px;
        }
        .products-container {
            display: flex;
            flex-wrap: wrap;
        }
        .cart-icon {
            position: relative;
            cursor: pointer;
            margin: 20px;
        }
        .cart-icon span {
            position: absolute;
            top: -10px;
            right: -10px;
            background: red;
            color: white;
            border-radius: 50%;
            padding: 5px 10px;
        }
        .cart-container {
            position: fixed;
            top: 20%;
            right: 0;
            width: 400px;
            background: #f8f9fa;
            border-left: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            padding: 20px;
            display: none;
        }
        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        .cart-product {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .cart-product img {
            width: 50px;
            height: auto;
        }
        .cart-footer {
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        .checkout-btn {
            background: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
            cursor: pointer;
        }
        .payment-info {
            background: #343a40;
            color: white;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .payment-info h3 {
            margin-bottom: 15px;
        }
        .payment-info input, .payment-info button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: none;
        }
        .payment-info button {
            background: #007bff;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div>
        <h1>Products</h1>
        <form method="post" class="products-container">
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="product">
                        <img src="admin/product_images/<?= htmlspecialchars($row['photo']) ?>" alt="<?= htmlspecialchars($row['first_product']) ?>" width="100">
                        <h2><?= htmlspecialchars($row['first_product']) ?></h2>
                        <p><?= htmlspecialchars($row['description']) ?></p>
                        <p>Price: $<?= number_format($row['prix'], 2) ?></p>
                        <p>Color: <?= htmlspecialchars($row['couleur']) ?></p>
                        <p>Size: <?= htmlspecialchars($row['size']) ?></p>
                        <button type="submit" name="add_to_cart" value="Add to Cart">Add to Cart</button>
                        <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No products found</p>
            <?php endif; ?>
        </form>
    </div>
    
    <div class="cart-icon" onclick="toggleCartContents()">
        <i class="fa-solid fa-cart-shopping"></i>
        <span><?= $cart_count ?></span>
    </div>
    
    <div class="cart-container" id="cart-container">
        <div class="cart-header">
            <h2>Shopping Cart</h2>
            <button onclick="toggleCartContents()">Close</button>
        </div>
        <ul>
            <?php if (!empty($cart_contents)): ?>
                <?php
                // Fetch product details for all products in the cart
                $product_ids = implode(',', array_keys($cart_contents));
                $sql = "SELECT product_id, first_product, photo, prix FROM produits WHERE product_id IN ($product_ids)";
                $product_result = $conn->query($sql);
                if ($product_result && $product_result->num_rows > 0) {
                    while ($product = $product_result->fetch_assoc()):
                ?>
                    <li class="cart-product">
                        <img src="admin/product_images/<?= htmlspecialchars($product['photo']) ?>" alt="<?= htmlspecialchars($product['first_product']) ?>">
                        <span><?= htmlspecialchars($product['first_product']) ?></span>
                        <span>$<?= number_format($product['prix'], 2) ?> x <?= $cart_contents[$product['product_id']] ?></span>
                    </li>
                <?php
                    endwhile;
                }
                ?>
            <?php else: ?>
                <li>Your cart is empty</li>
            <?php endif; ?>
        </ul>
        <div class="cart-footer">
            <div class="checkout-btn">Checkout</div>
        </div>
    </div>

    <div class="payment-info" id="payment-info" style="display: none;">
        <h3>Payment Info.</h3>
        <form>
            <div>
                <input type="radio" id="credit-card" name="payment-method" value="credit-card" checked>
                <label for="credit-card">Credit Card</label>
            </div>
            <div>
                <input type="radio" id="paypal" name="payment-method" value="paypal">
                <label for="paypal">PayPal</label>
            </div>
            <input type="text" name="name_on_card" placeholder="Name on Card" required>
            <input type="text" name="card_number" placeholder="Card Number" required>
            <input type="text" name="expiry_date" placeholder="MM/YY" required>
            <input type="text" name="cvv" placeholder="CVV" required>
            <button type="submit">Check Out</button>
        </form>
    </div>

    <script>
        function toggleCartContents() {
            var cartContainer = document.getElementById('cart-container');
            var paymentInfo = document.getElementById('payment-info');
            if (cartContainer.style.display === 'block') {
                cartContainer.style.display = 'none';
                paymentInfo.style.display = 'none';
            } else {
                cartContainer.style.display = 'block';
                paymentInfo.style.display = 'block';
            }
        }
    </script>
</body>
</html>

<?php
if (isset($conn)) {
    $conn->close();
}
?>
