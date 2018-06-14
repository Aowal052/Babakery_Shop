<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php  include '/../classes/addcategory.php';?>
<?php  include '/../classes/flavour.php';?>
<?php  include '/../classes/product.php';?>
<?php
     if (!isset($_GET['product_id']) || $_GET['product_id'] == NULL) {
        echo "<script>windows.location = 'productist.php';</script>";
    }else{
        $id = $_GET['product_id'];
    }
    $pd = new product;
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
        $updateProduct = $pd->updateProduct($_POST, $_FILES,$id);
    }

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>update Product</h2>
        <div class="block">  
        <?php if (isset($updateProduct)) {
            echo $updateProduct;
        } ?> 
        <?php

                $updata=$pd->getproductid($id);
                if ($updata) {
                    while ($value = $updata->fetch_assoc()) {
        ?>            
         <form action="#" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="product_name" value="<?php echo $value['product_name'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="cat_id">
                            <option>Select Category</option>
                            <?php 
                                $cat = new addcategory;
                                $getcat = $cat->getAllCat();
                                if ($getcat) {
                                    while ($result = $getcat->fetch_assoc()) {
                            ?>
                            <option
                                <?php 
                                    if ($value['cat_id']==$result['cat_id']) { ?>
                                        selected = "selected"
                                   <?php } ?> value="<?php echo $result['cat_id']; ?>"><?php
                                    echo $result['cat_name'];
                                ?> 
                            </option>
                            <?php } }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>flavour</label>
                    </td>
                    <td>
                        <select id="select" name="flavour_id">
                            <option>Select flavour</option>
                            <?php 
                                $flavour = new flavour;
                                $getflavour = $flavour->getAllflavour();
                                if ($getflavour) {
                                    while ($result = $getflavour->fetch_assoc()) {
                            ?>
                            <option
                                <?php 
                                    if ($value['flavour_id']==$result['flavour_id']) { ?>
                                        selected = "selected"
                                   <?php } ?> value="<?php echo $result['flavour_id']; ?>"><?php
                                    echo $result['flavour_name'];?>
                                    </option>
                            <?php } }?>
                        </select>
                    </td>
                </tr>
                
                 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body">
                            <?php echo $value['body'] ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $value['price'] ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $value['image'];?>" height="40px" width="60px"><br>
                        <input type="file" name="image" />
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php if ($value['type']==1) { ?>
                                <option selected = "selected" value="1">Featured</option>
                                <option value="2">Genarel</option>
                           <?php  }else{ ?>
                            <option selected = "selected" value="2">Genarel</option>
                            <option value="1">Featured</option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php } }?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


