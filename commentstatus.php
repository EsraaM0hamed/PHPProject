<?php
require_once 'config.php';
if(isset($_GET['op']) && $_GET['op']){
    $commentid = $_GET['id'];
    $comment = Comment::find_by_id($commentid);
    if($_GET['op'] == "Approve"){
        $comment->status = 'approved';
    }else if($_GET['op'] == "Delete"){
        $comment->status = 'deleted';
    }
    $comment->save();
    header("Location: commentForAdmin.php");

}

