<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
<?php  include '../classes/customer.php';?>

<?php
    if (!isset($_GET['ses_id']) || $_GET['ses_id'] == NULL) {
        echo "<script>windows.location = 'inbox.php';</script>";
    }else{
        $id = $_GET['ses_id'];
    }
    $cust = new customer;
    if ($_SERVER['REQUEST_METHOD'] =='POST') {
        $cat_name = $_POST['cat_name'];
        $catUpdate = $cust->catupdate($cat_name, $id);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
                <span style="color: green;"><?php 
                if (isset($catUpdate)) {
                    echo $catUpdate;
                }
             ?></span>

             <?php

                $updata=$updatecat->getcatid($id);
                if ($updata) {
                    while ($result = $updata->fetch_assoc()) {
             ?>
               <div class="block copyblock"> 
                 <form action="catedit.php?catid=<?php echo $id; ?>" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="cat_name" value="<?php echo $result['cat_name'] ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php } }?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>