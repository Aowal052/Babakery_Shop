<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
<?php  include '../classes/flavour.php';?>

<?php
    $flavour = new flavour;
    if ($_SERVER['REQUEST_METHOD'] =='POST') {
        $flavour_name = $_POST['flavour_name'];
        $flavourInsert = $flavour->flavourInsert($flavour_name);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Flavour</h2>
                <span style="color: green;"><?php 
                if (isset($flavourInsert)) {
                    echo $flavourInsert;
                }
             ?></span>
               <div class="block copyblock"> 
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="flavour_name" placeholder="Enter Category Name..." class="medium" />
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