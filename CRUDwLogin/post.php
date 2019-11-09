<?php
    require('config/db.php');
    // require('config/config.php');
    include('session.php');
    // session_start();

    // check if deleting
    if(isset($_POST['delete'])){

        $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

        $query = "DELETE FROM posts WHERE id = {$delete_id}";
    
        if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL.'blog.php');
        }else{
            echo 'ERROR: '. mysqli_error($conn);
        }
    }

    // xxx
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

<?php include('inc/header.php'); ?>
    <div class="container">
    <a href="<?php echo ROOT_URL.'blog.php'; ?>" class="btn btn-secondary btn-small">Back</a>
    <br>
    <br>
    <div>
        <h1><?php echo $post['title']; ?></h1>
        <small class="card-text">Created on <?php echo $post['created_at']; ?> by
            <?php echo $post['author']; ?></small>
            <p class="card-text"><?php echo $post['body']; ?></p>

            <hr>
            <form class="float-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
                <input type="submit" name="delete" value="Delete" class="btn btn-danger">
            </form>
            <a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id']; ?>" class="btn btn-primary btn-small">Edit</a>
    </div>
                

<?php include('inc/footer.php'); ?>

