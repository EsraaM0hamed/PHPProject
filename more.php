<?php
require "config.php";



ob_start();
$id=1;
//$id=$_post;
$post=Post::find($id);
$cat=Category::find($id);

//print($title);
$originalDate = $post->published;
$newDate = date("d-m-Y h:m", strtotime($originalDate));

if(isset($_POST['comment'])){
echo "wait for admin approvment ";
    $com=Comment::create(array("content"=>$_POST['comment'],"status"=>"draft"));


}else{
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>More...</title>
   
</head>

<body>
<body>
<style>
#img{
    border:5px solid grey;
    border-radius:10px;
}
#master{
    text-align:center;
    margin:5px;
    padding:5px;
    display:block;
    margin-left: 80px;
    border:5px solid lightgrey;
    border-radius:10px;
   
}

</style>
    <form action="" method="post">

   <div id="master">
       <img id="img" src="images/<?=$post->c_image?>" />
        <h2 id="data"><?=$post->title?></h2>
      
        <h3><?=$post->content?></h3>
    
        <h3><?=$cat->name?></h3>
        <h3><?=$newDate?></h3>
       
        <textarea cols=30 name=comment></textarea><br/>

        <input type="submit" value="Add Comment" name="addme"/> 

       
    </form>
    </div>
</body>  
</body>
</html>
<?php
}
require "footer.php";
?>