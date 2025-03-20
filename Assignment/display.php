<?php
// Connect to the Database
$connection = mysqli_connect('localhost', 'root', '', 'scripting');

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from orders table
$fetchSql = "SELECT customers.id, name, city, order_date, amount 
             FROM `orders` 
             INNER JOIN customers ON orders.customer_id = customers.id";

$fetchResult = mysqli_query($connection, $fetchSql);

if (!$fetchResult) {
    die("Query failed: " . mysqli_error($connection));
}
?>

<table border="1" style="border-collapse:collapse;">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>City</th>
        <th>Order Date</th>
        <th>Amount</th>
        
    </tr>
    <?php while ($row = mysqli_fetch_array($fetchResult)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td><?php echo $row['order_date']; ?></td>
            <td><?php echo $row['amount']; ?></td>
          
        </tr>
    <?php } ?>
    </table>