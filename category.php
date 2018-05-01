<?php require_once "CommonAdminPageStyle.php";?>
    <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white customWidth">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">Posts Categories</h6><br>
                <table border="1" class="w3-border w3-padding" id="cat" >
                    <tr  class="w3-border w3-padding">
                        <th class="w3-border w3-padding">Category Name</th>
                        <th class="w3-border w3-padding">Delete Category</th>
                    </tr>
                    <?php
                    
                        require_once 'config.php';
                        $category = Category::all(array('conditions' => "status = 'add'"));
                        for ($i = 0; $i<count($category); $i++) {
                    ?>
                <tr class="w3-border w3-padding"> 
                    <td class="w3-border w3-padding"><?= $category[$i]->name ?></td>
                    <td class="w3-border w3-padding"> 
                        <a href="deletecategory.php?id=<?= $category[$i]->id?>">delete</a>
                    </td>
                </tr>

               <?php
            }
        ?>

   </table>
    <br> 
              <form action="" method="post">
              
              <input type="text" placeholder="Type any category" name="categorytext">
              <input type="submit" class="w3-button w3-theme" name="addcategorybtn" value="Add Category">
            </from>

            </div>
          </div>
        </div>
      </div>

    </div>
  
<?php
if(isset($_POST['addcategorybtn']) && $_POST['addcategorybtn'] == 'Add Category')
{
    if(isset($_POST['categorytext']) && $_POST['categorytext'])
    {

        $attributes = array('name' => $_POST['categorytext'], 
                            'status' => 'add');
         Category::create($attributes);

    }


}

if(isset($_GET['err']) &&$_GET['err'] == "COP"){
    echo"<h4 id='caterror'>Sorry, there are posts related to this category</h4>";
}
require_once "footer.php";
?>