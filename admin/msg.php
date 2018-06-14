<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/customers.php';?>
<?php

    if (!isset($_GET['msg']) || $_GET['msg'] == NULL) {
        header('location:404.php');
    }else{
        $id = $_GET['msg'];
    }
 if ($_SERVER['REQUEST_METHOD'] =='POST') {
     $cmr = new customers;
     
 }

?>
<div class="grid_10">
    <div class="box round first grid">
        
             <?php
             $cmr = new customers;
            $showMsg = $cmr->showMsg($id);
            if ($showMsg) {
                while ($result = $showMsg->fetch_assoc()) {
                	
        ?>
            <table class="table" style="width: 50%;margin: 0 auto;text-align: center;">
                <tr>
                    <h3 style="text-align: center;">Message from <?php echo $result['name'];?></h3>
                    
                </tr>
                <tr>
                    <td><?php echo $result['message'];?></td>
                </tr>
                <button class="button"><a href="contact.php"></a>Go Back</button> 
            </table>    
            <?php } } ?>

        </div>

    </div>

</div>

<?php include 'inc/footer.php';?>