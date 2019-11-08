<?php
session_start();

//init variables

$username = "";
$email = "";

$errors = array();

$dbUser = 'me';
$password = "password";
$servername = "localhost";   
$dbname = "practiceDB";

//connect to db
// $db = mysqli_connect('localhost', 'root', 'practiceDB') or die("could not connect to database");
// $db = mysqli_connect('localhost', 'root', '', 'practiceDB') or die("could not connect to database");
// $db = new mysqli($servername, $dbUser, $password, $dbname);
$db = mysqli_connect($servername, $dbUser, $password, $dbname) or die("could not connect to database");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 


// Registered users
$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


//form validation
if (empty($username)) {array_push($errors, "username is required");};
if (empty($email)) {array_push($errors, "email is required");};
if (empty($password_1)) {array_push($errors, "Password is required");};
if ($password_1 != $password_2) {array_push($errors, "Passwords do not match.");};


// check db for existing user with sqme username
$user_check_query = "SELECT * FROM Users WHERE username = '$username' or email = '$email' LIMIT 1";

$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if($user) {
    if($user['username'] === $username){array_push($errors, "Username already exists.");};
    if($user['email'] === $email){array_push($errors, "This email ID has already registered.");};
}

// Register the userif no error
if(count($errors) === 0){
    $password = md5($password_1); 
    $query = "INSERT INTO Users (username, password, email) VALUES ('$username', '$password', '$email')";

    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in.";

    header('location: index.php');
}
if(isset($_POST['login_user'])) {

    $username = mysqli_real_escape_string($db, $POST['username']);
    $password = mysqli_real_escape_string($db, $POST['password']);
    if(empty($username)){
        array_push($errors, "Username is required");
    }
    if(empty($password)){
        array_push($errors, "password is required");
    }
    if(count($errors) === 0 ){
        $password = md($password);
        $query = "SELECT * FROM Users WHERE username = '$username' AND password = '$password'";
        $results = mysqli_query($db, $query);

        if(mysqli_num_rows($results)){
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Logged in successfully";
            header("location : index.php");

        }else{
            array_push($errors, "Wrong username/password combination. Try again.");
        }
    }
}
?>


