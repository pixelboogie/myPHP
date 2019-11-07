<?php
    require('config/db.php');
    // require('config/config.php');

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = 'SELECT * FROM  posts WHERE id = '.$id;

    // Get result
    $result = mysqli_query($conn, $query);

    // Fetch data
    $post = mysqli_fetch_assoc($result);
    // var_dump($posts);


    // Free result
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>PHP Blog</title>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
    <div class="container">
    <a href="<?php echo ROOT_URL; ?>" class="btn btn-primary btn-small">Back</a>
        <H1><?php echo $post['title']; ?></h1>
                            <small class="card-text">Created on <?php echo $post['created_at']; ?> by
                            <?php echo $post['author']; ?></small>
                            <p class="card-text"><?php echo $post['body']; ?></p>
                            </div>
                          
                </div> 

</body> 
</html>