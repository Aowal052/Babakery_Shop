<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/customers.php';?>
<?php include_once '../helpers/Format.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h3 style="text-align: center;">Message</h3>
             <?php
             $cmr = new customers;
             $fm = new Format;
            $getdata = $cmr->feedbackData();
            if ($getdata) {
            	$i = 0;
                while ($result = $getdata->fetch_assoc()) {
                	$i++;
        ?>
            <table class="table" style="width: 50%;margin: 0 auto;">
                <tr>
                    <th colspan="3" style="text-align: center">Feedback<?php echo $i;?></th>
                    
                </tr>

                <tr>
                    <th width="20%">name</th>
                    <td width="5%">:</td>
                    <td><?php echo $result['name'];?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>:</td>
                    <td><?php echo $result['email'];?></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>:</td>
                    <td><?php echo $result['mobile'];?></td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td>:</td>
                    <td><?php echo $fm->textShorten($result['message'], 40);?></td>
                </tr>
                <tr>
                    <th></th>
                    <td></td>
                    <td><a href="msg.php?msg=<?php echo $result['id'];?>">View</a></td>
                </tr>
            </table>    
            <?php } } ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>