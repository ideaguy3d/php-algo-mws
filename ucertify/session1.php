<?php


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

$action = null;
$action1 = 'addItem';
$action2 = 'removeItem';
$getProductId = 2;

$products = [
    new Product(0, "Laptop", 499),
    new Product(1, 'iPhone XR', 999),
    new Product(2, 'Android Tablet', 99),
];

foreach($products as $product) {
    $id = $product->getProductId();
    $name = $product->getProductName();
    $price = $product->getPrice();
    
    echo "\nproduct $id: $name cost \$$price\n";
}

// finally, let's use a session
if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

if($action === 'addItem') {
    addItem($getProductId);
}
else if($action === 'removeItem') {
    removeItem();
}
else {
    displayCart();
}

// Script Utility Methods
function addItem(int $productId) {
    global $products;
    if(!isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] = $products[$productId];
    }
}

function removeItem() {
    global $products;
}

function displayCart() {
    
    ?>
    <html lang="en">

    </html>
<?php } ?>


//