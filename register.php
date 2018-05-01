<?php
require_once 'config.php';
session_start();
$errorArray=array();
if(isset($_POST['registerBtn']) && $_POST['registerBtn'] == 'register')
{
    if(isset($_POST['username']) && $_POST['username'])
    {
        //$errorArray['nameError']=array();
        if(User::find_by_fname($_POST['username']))
        { 
            // "name already exist"; 
            $errorArray['nameError']='NAE'; 
        }else if (strlen($_POST['username']) > 10){
            // "too long name";
            $errorArray['nameError']='TLN';
        }else{
            $name = $_POST['username'];
        }

    }
    if(isset($_POST['email']) && $_POST['email'])
    {
        //$errorArray['emailError']=array();
        if(User::find_by_email($_POST['email']))
        { 
            // "email already exist"; 
            $errorArray['emailError']='MAE'; 
        }else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            //"Invalid email format"
            $errorArray['emailError']='IMF';
            
        }else{
            $userEmail = $_POST['email'];
        }

    }
    if(isset($_POST['pass']) && $_POST['pass'])
    {
        /*  Password must be at least 4 characters, 
	        no more than 8 characters, 
	        and must include at least one upper case letter, 
	        one lower case letter, 
	        and one numeric digit.
        */
        if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}$/",$_POST['pass']))
            //"pass contains uppercase ,lowercase , numbers (from 4 - 8 letters )";
            $errorArray['passError']='PNM';
        else{
            $userpass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
        }
    }
    if(isset($_POST['phone']) && $_POST['phone'])
    {
        if (!preg_match("/^[0-9]{11}$/",$_POST['phone'])){
            //"only numbers , 11 number";
            $errorArray['phoneError']='PNM';    
        }else{
            $userPhone=$_POST['phone'];
        }
    }
   
    if(empty($errorArray)){
        $attributes = array('fname' => $name, 
                            'password' => $userpass,
                            'phone' => $userPhone,
                            'status' => 'active',
                            'email' => $userEmail);
        $post = User::create($attributes);
       // $data= User::find_by_email($_POST['email']);
        //$_SESSION['userid']=$data->id;
        header("location: homepage.php");
    }
    
    
}


?>