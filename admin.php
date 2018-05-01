<?php
  require_once "CommonAdminPageStyle.php";
  require_once 'config.php';
$userPost = Post::all(array('conditions' => "status = 'draft'"));
$usercomment = Comment::all(array('conditions' => "status = 'draft'"));
for ($i = 0; $i<count($userPost); $i++) {
    $id= $userPost[$i]->u_id;
    $users=User::all(array('conditions' => "id = $id"));
    $username= $users[0]->fname;
    $categoryid= $userPost[$i]->cat_id;
    $category=Category::all(array('conditions' => "id = $categoryid"));
    $postcategory= $category[0]->name;
    
?>
    
<form action="" method='post'> 
      <div id="postWrapper"class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <h3>POST</h3>
        <h3><?= $userPost[$i]->title?></h3>
        <h5>published by :<?= $username ?> </h5>
        <h5>Category :<?= $postcategory ?> </h5>
        <span class="w3-right w3-opacity"> <?= $userPost[$i]->published?></span>
        <img src="images/<?=$userPost[$i]->c_image ?>" alt="Avatar" >
        <hr class="w3-clear">
        <p><?= $userPost[$i]->content;?></p>
        <input type="text" hidden name="postId" value=<?= $userPost[$i]->id; ?>>
        <input type="text" id="reasonFeild" name="reasonText" placeholder="Enter reason of Disapprove/Delete"><br>
        <input type="submit" id="btn1" value="Approve" name="ApproveBtn" class="w3-button w3-theme-d1 w3-margin-bottom"> 
        <input type="submit" id="btn2" value="Disapprove" name="DisapproveBtn" class="w3-button w3-theme-d1 w3-margin-bottom">
        <input type="submit" id="btn3" value="Delete" name="DeleteBtn" class="w3-button w3-theme-d1 w3-margin-bottom">
            </div>
</form>

<?php
}
if(isset($_POST['ApproveBtn']) )
{
    $id = $_POST['postId'];
    $userPost = Post::find_by_id($id);
    $userPost->status = 'approved';
    $userPost->save();
}
if(isset($_POST['DisapproveBtn']))
{
    $id = $_POST['postId'];
    $reason = $_POST['reasonText'];
    $userPost = Post::find_by_id($id);
    $userPost->sreason = $reason;
    $userPost->status = 'deleted';
    $userPost->save();
       
}
if(isset($_POST['DeleteBtn']))
{
    $id = $_POST['postId'];
    $reason = $_POST['reasonText'];
    $userPost = Post::find_by_id($id);
    $userPost->sreason = $reason;
    $userPost->status = 'deleted';
    $userPost->save();
}
require_once "footer.php";
?>
