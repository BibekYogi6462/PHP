<?php
session_start();
// check if user is not logged in ,redirect tham to login page
if(!isset($_SESSION['name'])){
    header("Location:login.php");
    exit;

}

//logout action

if(isset($_POST['logout'])){
        //destroy the session
        session_destroy();
        //redirect ot tlogin page after logout 
        header("Location:welcome.php");
        exit;
    }


    //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<implementation of login and logout using cookie>>>>>>>>>>>>>>>>>>>>>>>>



//     if (!isset($_COOKIE['name'])){
//         header('Location:login.php');
//     }
// if(isset($_POST['logout'])){
    //destroy the session
    // session_destroy();
    //redirect to login page after logout
    
//    $expiry=time()-60;
//    setcookie('name','',$expiry);
//     header('Location: login.php');
//     exit;
// }
?>
<h2>Hello WELCOME,<?php echo $_SESSION['name']; ?></h2>
<form action=""method="POST">
    <input type="submit" name="logout"value="logout">
</form>



<!-- <<<<<<<<<<<<<<<<<<<<<<<<<<<<IMPLEMENT LOGOUT USING COOKIE -->
<!-- <h2>Hello, PUTTHE CODE OF php echo $_COOKIE['username'];</h2>
<form action=""method="POST">
    <input type="submit" name="logout"value="logout">
</form> -->