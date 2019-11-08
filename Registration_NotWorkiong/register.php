<?php include('server.php'); ?>
<!DOCTYPE hmtl>
<html>
<head>
    <title>Registration </title>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Registration</h2>
    </div>
    <form action="register.php" method="post">
        <?php include('errors.php'); ?>
        <div>
            <label for="username">Username: </label>
            <input type="text" name="username">
        </div>
        <div>
            <label for="email">Email: </label>
            <input type="text" name="email">
        </div>
        <div>
            <label for="password_1">Password: </label>
            <input type="text" name="password_1">
        </div>
        <div>
            <label for="password_2">Confirm Password: </label>
            <input type="text" name="password_2">
        </div>
        <button type="submit">Submit</button>
        <p>Already a user?  <a href="login.php">Log in</a></p>
    </form>
</div>