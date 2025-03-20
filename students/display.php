<?php
// Connect to the Database
$connection = mysqli_connect('localhost', 'root', '', 'scripting');

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from students table
$fetchSql = "SELECT * FROM students";
$fetchResult = mysqli_query($connection, $fetchSql);

<table border="1" style="border-collapse:collapse;">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Password</th>
        <th>Faculty</th>
        <th>Gender</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_array($fetchResult)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['faculty']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td>
                <a href="update-student.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete-student.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </table>