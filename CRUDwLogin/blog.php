<?php
    require('config/db.php');

    include('session.php');

    $query = 'SELECT * FROM  posts ORDER BY created_at DESC';

    // Get result
    $result = mysqli_query($conn, $query);

    // Fetch data
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free result
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);

    ?>

<?php include('inc/header.php'); ?>
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
<?php include('inc/footer.php'); ?>