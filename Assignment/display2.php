<?php
$connection = mysqli_connect('localhost', 'root', '', 'scripting');

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$fetchSql = "SELECT customers.name AS customer_name,
COUNT(orders.id) AS total_orders,
SUM(orders.amount) AS total_amount,
AVG(orders.amount) AS average_amount
FROM customers
JOIN orders ON customers.id = orders.customer_id
GROUP BY customers.id
ORDER BY total_amount DESC";
$fetchResult = mysqli_query($connection, $fetchSql);

if (!$fetchResult) {
    die("Error: " . mysqli_error($connection));
}
?>

<table border="1px" style="border-collapse:collapse;">
    <tr>
        <th>Customer Name</th>
        <th>Total Orders</th>
        <th>Total Amount</th>
        <th>Average Amount</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($fetchResult)) { ?>
        <tr>
            <td><?php echo $row['customer_name']; ?></td>
            <td><?php echo $row['total_orders']; ?></td>
            <td><?php echo $row['total_amount']; ?></td>
            <td><?php echo $row['average_amount']; ?></td>
        </tr>
    <?php } ?>
</table>

<?php
mysqli_close($connection);
?>


<!-- select customers.name as customer_name,
count(orders.id)as total_orders,
sum(orders.amount)as total_amount,
avg(orders.amount) as average_amount
from customers customers
join orders orders on customers.id=orders.customer_id
group by customers.id  
order by total_amount desc; -->