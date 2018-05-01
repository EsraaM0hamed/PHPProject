<?php
require_once 'config.php';
//session_start();
if(isset($_POST['loginBtn']) && $_POST['loginBtn'] == 'login')
{
    $loginemailforuser="";
    $loginpassforuser=""; 
    if(isset($_POST['loginemail']) && $_POST['loginemail'])
    {
        $loginemailforuser=$_POST['loginemail'];

    }
    if(isset($_POST['loginpass']) && $_POST['loginpass'])
    {
        
        $loginpassforuser=$_POST['loginpass'];
    }
    
    $data= User::find_by_email($loginemailforuser);
    if($data){
        if(password_verify($loginpassforuser, $data->password)){
            if($loginemailforuser =="admin@gmail.com")
                header("location: admin.php");
            else{
                $_SESSION['userid']=$data->id;
                header("location: homepage.php");
            }
        
        }
    }
    else{
        $loginError="Invalid Data";
    }
}
?>