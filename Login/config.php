<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'myUser');
   define('DB_PASSWORD', 'myPassword');
   define('DB_DATABASE', 'myUsersDB');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

?>