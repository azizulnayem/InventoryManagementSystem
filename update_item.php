<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["item_id"], $_POST["new_quantity"], $_POST["new_price"])) {
    $item_id = intval($_POST["item_id"]);
    $new_quantity = intval($_POST["new_quantity"]);
    $new_price = floatval($_POST["new_price"]);

    $update_query = "UPDATE Items SET Quantity = $new_quantity, Price = $new_price WHERE ID = $item_id";
    if ($conn->query($update_query) === TRUE) {
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
    <title>Update Item</title>
</head>
<body>
    <h1>Update Item in Inventory</h1>
    <?php
    // Fetch the item details from the database based on item ID
    if (isset($_GET["item_id"])) {
        $item_id = intval($_GET["item_id"]);
        $item_query = "SELECT * FROM Items WHERE ID = $item_id";
        $item_result = $conn->query($item_query);
        $item = $item_result->fetch_assoc();
    }
    ?>

    <?php if (isset($item)) { ?>
        <form method="POST" action="update_item.php">
            <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
            
            <label for="new_quantity">New Quantity:</label>
            <input type="number" name="new_quantity" value="<?php echo $item["Quantity"]; ?>" required><br>
            
            <label for="new_price">New Price:</label>
            <input type="number" step="0.01" name="new_price" value="<?php echo $item["Price"]; ?>" required><br>
            
            <input type="submit" value="Update Item">
        </form>
    <?php } else { ?>
        <p>Item not found.</p>
    <?php } ?>
</body>
</html>
