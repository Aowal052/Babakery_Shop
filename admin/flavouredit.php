<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
<?php  include '../classes/flavour.php';?>

<?php
    if (!isset($_GET['flavour_id']) || $_GET['flavour_id'] == NULL) {
        echo "<script>windows.location = 'brandlist.php';</script>";
    }else{
        $id = $_GET['flavour_id'];
    }
    $flavour = new flavour;
    if ($_SERVER['REQUEST_METHOD'] =='POST') {
        $flavour_name = $_POST['flavour_name'];
        $flavour_name = $flavour->flavourUpdate($flavour_name, $id);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update flavour</h2>
                <span style="color: green;"><?php 
                if (isset($flavourUpdate)) {
                    echo $flavourUpdate;
                }
             ?></span>

             <?php

                $updata=$flavour->getflavourid($id);
                if ($updata) {
                    while ($result = $updata->fetch_assoc()) {
             ?>
               <div class="block copyblock"> 
                 <form action="flavouredit.php?flavour_id=<?php echo $id; ?>" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="flavour_name" value="<?php echo $result['flavour_name'] ?>" class="medium" />
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