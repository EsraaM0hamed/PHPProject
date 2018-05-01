<?php
require_once 'config.php';
if(isset($_GET['op']) && $_GET['op']){
    $userid = $_GET['id'];
    $user = User::find_by_id($userid);
    if($_GET['op'] == "activate"){
        $user->status = 'active';
    }else if($_GET['op'] == "deactivate"){
        $user->status = 'inactive';
    }
    else if($_GET['op'] == "delete"){
        $user->status = 'deleted';
    }
    $user->save();
    header("Location: usersForAdmin.php");

}

