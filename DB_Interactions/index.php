<?php
    require('config/db.php');
    // require('config/config.php');

    $query = 'SELECT * FROM  posts';

    // Get result
    $result = mysqli_query($conn, $query);

    // Fetch data
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    var_dump($posts);
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
<style>
.myRight{
    /* position: absolute;
    right: 10px; 
    bottom: 10px; */
}
</style>
</head>
<body>
    <div class="container">
        <H1>Blog Posts</h1>
            <?php foreach($posts as $post) : ?>
                <div class="card">
                            <div class="card-header">
                                <h5 class="card-title"><?php echo $post['title']; ?></h5></div>
                                <div class="card-body">
                            <small class="card-text">Created on <?php echo $post['created_at']; ?> by
                            <?php echo $post['author']; ?></small>
                            <p class="card-text"><?php echo $post['body']; ?></p>
                            <a class="btn btn-primary btn-sm" href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>">Read More</a>
                          
                            </div>
                          
                </div> 
                <div style="height: 20px"></div>
            <?php endforeach; ?>
</body> 
</html>