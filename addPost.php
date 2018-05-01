<?php
require "config.php";
//require "user.php";


ob_start();
// $id=1;
// //$id=$_post;
// $post=Post::find($id);
// $cat=Category::find($id);

if(isset($_POST['addme']) && $_POST['addme'] == 'Add Post')
{
    $attributes = array('title' => $_POST['title'], 
    'content' => $_POST['content'],
    'c_image' => "4.jpg",
    'status' => 'draft',
    'published' => "now()",
    'sreason' => 'any reason ',
    'cat_id' => "1",
    'u_id' => '5');
$post = Post::create($attributes);
}
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
    <title>Add Post</title>
   
</head>

<body>
<body>
<style>
#img{
    border:5px solid grey;
    border-radius:10px;
}
#master{
   
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

 
       Title: <textarea  cols=30 name="title"></textarea><br/>
       content: <textarea  cols=30 name="content"></textarea><br/>
       <input type="file" name="fileToUpload" id="fileToUpload">
       <input type="submit" value="Upload Image" name="submit"><br/>

     
       <select name="Category">
       <option value="volvo">Category</option>
      <option value="volvo">Sport</option>
      <option value="saab">Art</option>
 
</select> <br>

         <input type="submit" value="Add Post" name="addme"/>
    </form>
    </div>
</body>  
</body>
</html>
<?php
}
require "footer.php";
?>