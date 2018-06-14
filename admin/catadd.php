<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php  include '../classes/addcategory.php';?>

<?php
    $addcat = new addcategory;
    if ($_SERVER['REQUEST_METHOD'] =='POST') {
        $cat_name = $_POST['cat_name'];
        $catInsert = $addcat->catInsert($cat_name);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
                <span style="color: green;"><?php 
                if (isset($catInsert)) {
                    echo $catInsert;
                }
             ?></span>
               <div class="block copyblock"> 
                 <form action="catadd.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="cat_name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>