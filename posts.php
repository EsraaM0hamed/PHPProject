<?php
    // require_once("config.php");
    // print("Hello");
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // print("Hello,From the post request");
        if (!empty($_POST['title']) && !empty($_POST['content'])) {

            $title = $_POST['title'];
            $content = $_POST['content'];
            $imgSrc = $_POST['img'];
            $category =$post['category'];
            
            if($category == 'sport'){
                $catId = 1;
            }elseif($category=='art'){
                $catId = 2;
            }

            // $user = Post::create($userName);

            $status = "draft";
            $attributes = array('title' => $title, 'content' => $content,'c_image'=>$imgSrc,'status'=>$status,'cat_id'=>$catId);
            $post = new Post($attributes);
            $post->save();
            // header("Location: posts.php");
            // print($title.$content.$imgSrc);
        }else{
            print("Validate your post");
        }
    }


?>