<?php
require_once "config.php";

// Execute the query to retrieve items
$query = "SELECT * FROM Items";
$result = $conn->query($query); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory Management System</title>
</head>
<body>
    <h1>Inventory Items</h1>

    <!-- Display inventory list -->
    <table border="1">
        <tr>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Actions</th> <!-- New column for update buttons -->
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr <?php if ($row["Quantity"] < 10) echo 'style="background-color: #FFCCCC;"'; ?>>
                <td><?php echo $row["ItemName"]; ?></td>
                <td><?php echo $row["Quantity"]; ?></td>
                <td><?php echo $row["Price"]; ?></td>
                <td>
                    <a href="update_item.php?item_id=<?php echo $row["ID"]; ?>">Update Item</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <!-- Calculate and display total inventory value -->
    <?php
    $total_query = "SELECT SUM(Quantity * Price) AS TotalValue FROM Items";
    $total_result = $conn->query($total_query);
    $totalValue = $total_result->fetch_assoc()["TotalValue"];
    ?>
    <h2>Total Inventory Value: <?php echo number_format($totalValue, 2); ?></h2>
    
    <a href="add_item.php"><button>Add New Item</button></a>
</body>
</html>
