<?php
include ('connection.php');

$fetchSql="SELECT * FROM students";
$fetchResult=mysqli_query($connection,$fetchSql);



?>
<table border="1" style="border-collapse:collapse;">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Faculty</th>
        <th>Gender</th>
       
    </tr>
    <!-- $row=mysqli_fetch_assoc -->
    <?php while($row = mysqli_fetch_array($fetchResult)){ ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['faculty'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td>
                <a href="update_student.php ? id=<?php echo $row['id']; ?>">Edit</a>
    
                <a href="delete_student.php ?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you wat to delete this student?')">Delete</a>
            </td>
        </tr>
        
        


    
    <?php } ?>
</table>