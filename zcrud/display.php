<?php
session_start();
// echo 'Welcome '.$_SESSION['email'];

?>


<html>
  <head>
    <title>Display</title>
    <style>
      body {
        background: #D071f9;
      }
      table {
        background: white;
        width: 85%;
        margin: 0 auto;
        border-collapse: collapse;
      }
      th, td {
        padding: 10px;
        text-align: center;
      }
      th {
        background-color: #f2f2f2;
      }
      td {
        background-color: #fafafa;
      }
      .action-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 25px;
      }
      .action-buttons a {
        text-decoration: none;
        color: white;
      }
      .btn-update {
        background-color: #4CAF50; /* Green */
        padding: 8px 16px;
        margin-right: 5px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      .btn-delete {
        background-color: #f44336; /* Red */
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
    </style>
  </head>

<?php
include("connection.php");
error_reporting(0);
$useremail = $_SESSION['email'];
if($useremail == true)
{

}
else{
  header('location:login.php');
}

$query = "SELECT * FROM form";
$result = mysqli_query($connection, $query);

if (!$result) {
  die("Query failed: " . mysqli_error($connection));
}
?>

<h2 align="center"><mark>Displaying All Records</mark></h2>

    <table border="1" cellspacing="0" cellpadding="10" align="center">
        <tr>
            <th width="5%">Id</th>
            <th width="5%">Image</th>
            <th width="8%">First Name</th>
            <th width="8%">Last Name</th>
            <th width="10%">Gender</th>
            <th width="20%">Email</th>
            <th width="10%">Phone</th>
            <th width="10%">Favourite</th>
            <th width="24%">Address</th>
            <th width="15%">Action</th>
        </tr>

        <?php while ($row = mysqli_fetch_array($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><img src="<?php echo $row['std_image']; ?>" height="100px" width="100px"></td>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['favourite']; ?></td>
            <td><?php echo $row['address']; ?></td>
    
            <td class="action-buttons">
              <a href="update.php?id=<?php echo $row['id']; ?>">
                <button class="btn-update">Update</button>
              </a>
              <a href="delete.php?id=<?php echo $row['id']; ?>" onclick='return checkDelete();'>
                <button class="btn-delete">Delete</button>
              </a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <a href="logout.php">
<input type="submit"  value="Logout" style="background:blue; color:white; height:20px; margin-top: 40px; cursor:pointer;">
        </a>
    <script>
      function checkDelete() {
        return confirm('Are you sure you want to delete?');
      }
    </script>
</html>
