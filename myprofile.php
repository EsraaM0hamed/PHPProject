<?php
require_once 'config.php';
session_start();



$x = $_SESSION['userid'];

$postsOfuser=Post::all(array('conditions' => "u_id = $x"));

$user = User::all(array('conditions' => "id = $x"));


for($i=0;$i<count($postsOfuser);$i++){
    
    $category_id =$postsOfuser[$i]->cat_id;
    $category = Category::all(array('conditions' => "id = $category_id"));
  
    $post_title = $postsOfuser[$i]->title;
    $post_content = $postsOfuser[$i];
  }




?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/profile.css">
    </head>
    <body>
        <div class="categoryname"><h1><?php if(isset($user[0]->fname))echo $user[0]->fname; ?></h1></div>
        <div class="container">
                <?php for($i=0;$i<count($postsOfuser);$i++){   
                    
                    $category_id =$postsOfuser[$i]->cat_id;
                    $post_title = $postsOfuser[$i]->title;
                    $category = Category::all(array('conditions' => "id = $category_id"));
                    $post_content = $postsOfuser[$i]->content;
                ?>
                <div class="posts" >
                
                <h2 name="title"><a href="more.php"><?php echo $post_title; ?></a></h2>
                <p class="con" value="para_content" name="content"><?php echo $post_content;?> <a href="more.php">more</a></p>
                <div class="by">Category <h5 name="category"><?php echo $category[0]->name;?></h5></div>
               <a href="addPost.php">Edit post</a>
                
                <hr>
                <?php } ?>
            </div>
            
            <button name="back">back</button>
        </div>
    </body>




</html>