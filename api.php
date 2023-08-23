<?php
require_once "config.php";

$query = "SELECT * FROM Items";
$result = $conn->query($query);

$items = array();
while ($row = $result->fetch_assoc()) {
    $items[] = $row;
}

header("Content-Type: application/json");
echo json_encode($items);
?>
