<?php require_once "CommonAdminPageStyle.php";?>
    <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white customWidth">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">Commnets</h6><br>
                <table border="1" class="w3-border w3-padding" id="cat" >
                    <tr  class="w3-border w3-padding">
                        <th class="w3-border w3-padding">UserName</th>
                        <th class="w3-border w3-padding">PostNmae</th>
                        <th class="w3-border w3-padding">Comment Title</th>
                        <th class="w3-border w3-padding">Commnet Content</th> 
                        <th class="w3-border w3-padding">Operations</th>   
                    </tr>

                    <?php
                        require_once 'config.php';
                        $comment = Comment::all(array('conditions' => "status = 'draft'"));    
                        for ($i = 0; $i<count($comment); $i++) {
                            $userId = $comment[$i]->u_id;
                            $user = User::all(array('conditions' => "id = $userId"));
                            $postId = $comment[$i]->pos_id;
                            $post = Post::all(array('conditions' => "id = $postId"));

                    ?>
                    
                <tr class="w3-border w3-padding"> 
                    <td class="w3-border w3-padding"><?= $user[0]->fname ?></td>
                    <td class="w3-border w3-padding"><?= $post[0]->title ?></td>
                    <td class="w3-border w3-padding"><?= $comment[$i]->title ?></td>
                    <td class="w3-border w3-padding"><?= $comment[$i]->content ?></td>
                    <td class="w3-border w3-padding"><a href="commentstatus.php?op=Approve&id=<?= $comment[$i]->id?>">Approve</a>
                        <a href="commentstatus.php?op=Delete&id=<?= $comment[$i]->id?>">Delete</a>
                        
                      </td>  
                   
                </tr>

               <?php
            }
        ?>

   </table>
               <br>    
            </div>
          </div>
        </div>
      </div>

    </div>
  <?php require_once "footer.php";?>