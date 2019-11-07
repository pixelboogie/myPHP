<?php
session_start();

//init variables

$username = "";
$email = "";

$error = array();


//connect to db
$db = mysqli_connect('localhost', 'root', 'practiceDB') or die("could not connect to database");

// Registered users
$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


//form validation
if (empty($username)) {
     array_push($errors, "username is required");
    };
if(empty($email)) {array_push($errors, "email is required")};
if(empty($password_1)) {array_push($errors, "Password is required")};
if($password_1 != $password_2) {array_push($erros, "Passwords do not match.")};

?>


