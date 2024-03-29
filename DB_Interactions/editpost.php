<?php
    require('config/db.php');
    // require('config/config.php');

    // check if submitted
    if(isset($_POST['submit'])){
        // echo 'Submitted';
        $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $author = mysqli_real_escape_string($conn, $_POST['author']);
        $body = mysqli_real_escape_string($conn, $_POST['body']);


        // $query = "INSERT INTO posts(title, author, body) VALUES ('$title', '$author', '$body')";
        $query = "UPDATE posts SET 
                title='$title',
                author ='$author',
                body ='$body'
            WHERE id = {$update_id}";
    
        if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL.'');
        }else{
            echo 'ERROR: '. mysqli_error($conn);
        }
    }
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
        <H1>Edit Posts</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-=group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $post['title']; ?>">
            </div>
            <div class="form-=group">
                <label>Author</label>
                <input type="text" name="author" class="form-control" value="<?php echo $post['author']; ?>">
            </div>
            <div class="form-=group">
                <label>Body</label>
                <textarea name="body" class="form-control"><?php echo $post['body']; ?></textarea>
            </div>
            <br>
            <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div> 
<div style="height: 20px"></div>
<?php include('inc/footer.php'); ?>