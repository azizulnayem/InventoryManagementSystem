# InventoryManagementSystem

**Database Schema Design:** I crafted the database structure by creating an SQL file named "inventory_schema.sql." Inside this file, I defined the necessary table named "Items." This table features columns for unique IDs (automatically incremented), item names, quantities, and prices. This schema sets the foundation for storing inventory data effectively.

**Database Configuration:** To manage database connections, I established a configuration file named "config.php." Within this file, I stored essential details for connecting to the database, ensuring a secure and organized approach to handling data.

**Web Page for Inventory Display:** I developed a web page titled "index.php" to present users with an organized list of inventory items, sourced directly from the "Items" table. The displayed information includes item names, quantities, and prices, providing users with a clear overview of their inventory.

**Item Addition and Updating:** To enhance user interaction, I have developed an "add_item.php" and integrated input fields on the "index.php" page, allowing users to add new items to their inventory. Moreover, users can conveniently modify existing item details. This seamless feature empowers users to maintain an accurate inventory record.

**API Integration:** I introduced an "api.php" file to serve as an API endpoint and integrated that with the help of AJAX in the "index2.php" file. By accessing this endpoint, users can retrieve inventory data from the "Items" table, streamlining external integrations and enhancing inventory management capabilities.

**Total Inventory Value Calculation**: I implemented a practical feature that computes the total value of the entire inventory. This calculation factors in both item quantities and their corresponding prices. The resulting total value is displayed at the bottom of the inventory list on the "index.php" page, offering users a comprehensive overview of their inventory's financial aspect.

**Low Stock Alerts:** For proactive inventory management, I established a mechanism to identify items with quantities below 10 units. These low-stock items are visually highlighted in the inventory list on the "index.php" page, ensuring users are alerted to potential shortages and can take timely action to replenish their inventory.

With these steps, I've created a comprehensive Inventory Management System that facilitates efficient tracking and management of inventory items.

