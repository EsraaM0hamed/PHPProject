<?php
require_once "CommonAdminPageStyle.php";
?>

    <div class="w3-col m7 ">
    <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white customWidth">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">Users</h6><br>


                <table border="1" class="w3-border w3-padding" id="tableid">
                    <tr  class="w3-border w3-padding">
                       
                        <th class="w3-border w3-padding">Name</th>
                        <th class="w3-border w3-padding">Email</th>
                        <th class="w3-border w3-padding">Phone</th>
                        <th class="w3-border w3-padding">Status</th>
                        <th class="w3-border w3-padding">#posts</th>
                        <th class="w3-border w3-padding">#comments</th>
                        <th class="w3-border w3-padding">Operations</th>
                        
           
                    </tr>
                    <?php
                    
                        require_once 'config.php';
                        $users = User::all();
                        
                        for ($i = 0; $i<count($users); $i++) {
                            $x=$users[$i]->id;
                            $userPost = Post::all(array('conditions' => "u_id = $x "));
                            $userComment = Comment::all(array('conditions' => "u_id = $x "));

                    ?>
                <tr class="w3-border w3-padding"> 
                    <td class="w3-border w3-padding"><?php if(isset($users[$i]->fname)) echo $users[$i]->fname; ?></td>
                    <td class="w3-border w3-padding"><?php if(isset($users[$i]->email)) echo $users[$i]->email; ?></td>
                    <td class="w3-border w3-padding"><?php if(isset($users[$i]->phone)) echo $users[$i]->phone; ?></td>
                    <td class="w3-border w3-padding"><?php if(isset($users[$i]->status)) echo $users[$i]->status; ?></td>
                    
                    <td class="w3-border w3-padding"><?= count($userPost) ?></td>
                    <td class="w3-border w3-padding"><?= count($userComment) ?></td>

                    <td class="w3-border w3-padding"> 
                          
                        <a href="userstatus.php?op=activate&id=<?= $users[$i]->id?>">Activate</a>
                        <a href="userstatus.php?op=deactivate&id=<?= $users[$i]->id?>">Deactivate</a>
                        <a href="userstatus.php?op=delete&id=<?= $users[$i]->id?>">Delete</a>
                          
                    </td>
                </tr>

               <?php
            }
        ?>

   </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  
<?php require_once "footer.php";?>