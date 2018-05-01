<?php
require_once 'config.php';
$categoryid = $_GET['id'];
$errorMsg="";
$category = Category::find_by_id($categoryid);
$post = Post::find_by_cat_id($categoryid);
$errorMsg = "";
if($post){
    $errorMsg="COP";
    
}else{
    $category->status = 'delete';
    $category->save();
  
}
header("Location: category.php?err=$errorMsg");