<?php


require_once 'config.php';

$x = $_GET['id'];




// $c_id = Category::all(array('conditions' => "name ='$x'"));
// $c_id=Category::find($x);
// echo $c_id;
// exit;
$category=Category::all($x);
$categoryName=$category->name;
$posts_cat = Post::all(array('conditions' => "cat_id = $x"));
// print_r($posts_cat);
// exit;
if(isset($_POST['back'])){
    header('Location: homepage.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Category Posts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/category.css">
    </head>
    <body>
        <div class="categoryname"><h1><?php echo $categoryName ?></h1></div>
        <div class="container">
            
            <div class="posts" >
                <?php for($i=0; $i<count($posts_cat); $i++){
                    $p_title = $posts_cat[$i]->title;
                    $p_content = substr($posts_cat[$i]->content,0,140);

                    $id = $posts_cat[$i]->u_id;
                    $users = User::all(array('conditions' => "id = $id"));

                
                ?>
                <h2 name="title"><a href="postContent.html"><?php echo $p_title; ?></a></h2>
                <p class="con" value="para_content" name="content"><?php echo $p_content;?> <a href="postContent.html">more</a></p>
                <div class="by">by <h5 name="username"><?php echo $users[0]->fname;?></h5></div>
                
                <hr>
                <?php }; ?>
            </div>
            
            <button name="back">back</button>
        </div>
    </body>
</html>
