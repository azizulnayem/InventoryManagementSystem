<!DOCTYPE html>
<html>
<head>
    <title>Inventory Management System</title>
</head>
<body>
    <h1>Inventory Items</h1>

    <!-- Display inventory list -->
    <table border="1" id="inventoryTable">
        <tr>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Actions</th> <!-- New column for update buttons -->
        </tr>
    </table>

    <!-- Calculate and display total inventory value -->
    <h2>Total Inventory Value: <span id="totalValue"></span></h2>
    
    <a href="add_item.php"><button>Add New Item</button></a>

    <!-- JavaScript to fetch and display inventory data -->
    <script>
        function fetchInventoryData() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "api.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var inventoryData = JSON.parse(xhr.responseText);
                    displayInventoryData(inventoryData);
                }
            };
            xhr.send();
        }

        function displayInventoryData(data) {
            var inventoryTable = document.getElementById("inventoryTable");
            var tbody = inventoryTable.querySelector("tbody");
            tbody.innerHTML = ""; // Clear existing rows

            data.forEach(function (item) {
                var row = tbody.insertRow();
                row.innerHTML = "<td>" + item.ItemName + "</td>" +
                                "<td>" + item.Quantity + "</td>" +
                                "<td>" + item.Price + "</td>" +
                                "<td><a href='update_item.php?item_id=" + item.ID + "'>Update Item</a></td>";
            });

            // Calculate and display total inventory value
            var totalValue = data.reduce(function (total, item) {
                return total + parseFloat(item.Quantity) * parseFloat(item.Price);
            }, 0);
            document.getElementById("totalValue").textContent = totalValue.toFixed(2);
        }

        // Fetch inventory data when the page loads
        window.onload = function () {
            fetchInventoryData();
        };
    </script>
</body>
</html>
