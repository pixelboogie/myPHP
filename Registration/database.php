<?php

$dbUser = 'me';
$password = "password";
$servername = "localhost";   
$dbname = "PracticeDB";

$db = new mysqli($servername, $dbUser, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 

$user_check_query = "SELECT * FROM Users";
$results = mysqli_query($db, $user_check_query);



if (mysqli_num_rows($results) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($results)) {
        echo "Name: " . $row["username"]. " Pass: " . $row["password"]. " email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}
mysqli_close($db);

?>