<?php
//include 'home.html';
session_start();
require_once 'config.php';


 //$_SESSION['cat']=$_POST['cat'] ;
$y=$_SESSION['userid'];



$posts = Post::all(array('conditions' => "status = 'approved'"));
//echo count($posts)-1;
if((count($posts)-1)>=10){
  for($j=(count($posts)-1);$j<(count($posts)-10); $j--){
  $posts_viewed = $posts[$j];
  //print_r($posts_viewed);
  }
}else{
  $posts_viewed = $posts;
  //print_r($posts_viewed);
}


for($i=0;$i<count($posts_viewed);$i++){
  $id = $posts_viewed[$i]->u_id;
  $users = User::all(array('conditions' => "id = $id"));

  $categoryid =$posts_viewed[$i]->cat_id;
  $category = Category::all(array('conditions' => "id = $categoryid"));

  $post_title = $posts_viewed[$i]->title;
  $post_content = substr($posts_viewed[$i]->content,0,140);
}


if(isset($_POST['add'])){
  header('Location: createpost.html');
}

if(isset($_POST['logout'])){
  header('Location: login.html');
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/home.css">
    </head>
    <body>
        <header class="head"><h3>Welcome</h3><span class="logout"><button class="b1">Logout</button></span></header>
            <img src="profile.png" class="img">
            <div class="link"><a href="myprofile.php" >My profile</a></div>
            <div class="vl"></div>
            
           
        <div class="container">
          <?php for($i=0;$i<count($posts_viewed);$i++){   
            $id = $posts_viewed[$i]->u_id;
            $categoryid =$posts_viewed[$i]->cat_id;
            $post_title = $posts_viewed[$i]->title;
            $category = Category::all(array('conditions' => "id = $categoryid"));
            $users = User::all(array('conditions' => "id = $id"));
            
            ?>
            <div class="posts" >
                
                <h2 name="title"><a href="postContent.html" ><?php echo $post_title = $posts_viewed[$i]->title; ?></a></h2>
                <p class="con"  name="content"><?php echo $post_content = substr($posts_viewed[$i]->content,0,140); ?><a href="more.php"> more</a></p>
                
                <div class="by">by <h5 name="username" ><?php echo $users[0]->fname; ?></h5></div>
                <div class="category">category: <h5 name="category" ><a href="categoryposts.php?id=<?=$category[0]->id?>" ><?php echo $category[0]->name; ?></a></h5></div>
                <hr>
                
            </div>
          <?php }; ?>
           <a href="addPost.php">Add post</a>
        </div>
        
    </body>
</html>

