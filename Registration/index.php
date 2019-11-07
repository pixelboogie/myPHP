<?php 

session_start();
// if(isset($_SESSION['username'])){
//     $_SESSION['msg'] = "You must log in to view this page.";
//     header("location : login.php");
// }

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header("location : login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- <meta charset="utf-8"> -->
<title>Home Page</title>
</head>
<body>
<h1>This is the Home Page.</h1>
<a href="index.php?logout=1">Logout</a>
<?php 
    if(isset($_SESSION['success'])) : ?>
<div>
<h3>   
<?php 
    echo $_SESSION['success'];
    unset($_SESSION['username']);
?>
 </h3>

</div>
<?php endif ?>


<?php if(isset($_SESSION['username'])) : ?>
    <h3>Welcome<strong>
    <?php 
     echo $_SESSION['username']; 
    ?>
    </strong></h3>

    <a href="index.php?logout=1">Logout</a>
    <?php endif ?>
</body>
</html>