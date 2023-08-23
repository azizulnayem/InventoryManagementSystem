<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["item_name"], $_POST["quantity"], $_POST["price"])) {
    $item_name = $_POST["item_name"];
    $quantity = intval($_POST["quantity"]);
    $price = floatval($_POST["price"]);

    $insert_query = "INSERT INTO Items (ItemName, Quantity, Price) VALUES ('$item_name', $quantity, $price)";
    if ($conn->query($insert_query) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Item</title>
</head>
<body>
    <h1>Add New Item to Inventory</h1>
    <form method="POST" action="add_item.php">
        <label for="item_name">Item Name:</label>
        <input type="text" name="item_name" required><br>
        
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required><br>
        
        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" required><br>
        
        <input type="submit" value="Add Item">
    </form>
</body>
</html>
