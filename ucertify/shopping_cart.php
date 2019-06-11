<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 11/26/2018
 * Time: 1:14 AM
 */

namespace julius\prac;

session_start();

class Product
{
    private $productId;
    private $productName;
    private $price;

    public function __construct(int $productId, string $productName, float $price) {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->price = $price;
    }

    public function getProductId() {
        return $this->productId;
    }

    public function getProductName() {
        return $this->productName;
    }

    public function getPrice() {
        return $this->price;
    }
}

$action = $_GET['action'] ?? null;
$cartSession = $_SESSION['cart'] ?? null;
$getProductId = $_GET['product-id'] ?? null;

$products = [
    new Product(0, "Laptop", 499),
    new Product(1, 'iPhone XR', 999),
    new Product(2, 'Android Tablet', 99)
];

// finally, let's use a session
if (!$cartSession) {
    $cartSession = [];
}

if ($action === 'add-item') {
    addItem((int)$getProductId);
}
else if ($action === 'remove-item') {
    removeItem((int)$getProductId);
}
else {
    displayCart();
}

//-----------------------------------------------------
//-------------- Script Utility Methods --------------
//-----------------------------------------------------
function addItem(int $productId) {
    global $products;

    if (!isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] = $products[$productId];
    }

    session_write_close();
    header('Location: shopping_cart.php');
}

function removeItem(int $productId) {
    global $products;

    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }

    session_write_close();
    header('Location: shopping_cart.php');
}

/**
 *
 */
function displayCart() {
    global $products;

    ?>
    <html lang="en">
    <head>
        <title>Julius Shopping Session</title>
    </head>

    <body>
    <div class="ja-shopping-cart-container">
        <div style="width: 50%; margin: auto;">
            <h1>Your Shopping Cart</h1>

            <dl class="ja-session-shipping-car">
                <?php
                $totalPrice = 0;
                foreach ($_SESSION['cart'] as $product) {
                    $totalPrice += $product->getPrice(); ?>
                    <!-- Products in cart -->
                    <dt><?= $product->getProductName() ?></dt>
                    <dd class="ja-php-embed">
                        <?= number_format($product->getPrice(), 2) ?>
                        <a href="shopping_cart.php?action=remove-item&product-id=<?= $product->getProductId() ?>">
                            Remove
                        </a>
                    </dd>
                <?php } ?>

                <!-- Cart Total -->
                <dt>Cart Total:</dt>
                <dd><b>$ <?= number_format($totalPrice, 2) ?></b></dd>
            </dl>

            <!-- Product List part -->
            <h1>Product List</h1>
            <dl class="ja-session-product-list">
                <?php foreach ($products as $product) { ?>
                    <dt><?= $product->getProductName() ?></dt>
                    <dd class="ja-session-add-item">
                        <?= number_format($product->getPrice()) ?>
                        <a href="shopping_cart.php?action=add-item&product-id=<?= $product->getProductId() ?>">
                            Add Item
                        </a>
                    </dd>
                <?php } ?>
            </dl>
        </div>
    </div>

    </body>
    </html>
<?php } ?>