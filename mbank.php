<?php include 'design/start.php'; ?>
<?php include 'design/header.php';?>
<?php
    $login = Session::get("login");
    if ($login==false) {
        header("Location:login.php");
    }
?>
<?php
    $id = Session::get("id");
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
        $takeOrder = $ct->takePayment($_POST,$id);
        
    }
?>

<style type="text/css">
    form{
        width: 50%;
        margin: 0 auto;
    }
</style>

 <div class="main">
    <div class="content">
        <div class="cartoption">        
        <div class="cartpage">
             <h3 style="text-align: center;">User Profile</h3>
             <?php
                if (isset($updateProduct)) {
                    $chk = $ct->checkCartTable();
                    if ($chk) {
                        header('location:payment.php');
                    }else{
                        header('location:profile.php');
                    }
                    
        }
             ?>
             <?php
            $id = Session::get("id");
            $getdata = $cmr->customerData($id);
            if ($getdata) {
                while ($result = $getdata->fetch_assoc()) {
        ?>
        <form action="" method="post">
            <table class="table" style="width: 50%;margin: 0 auto;">
                <tr>
                    <th colspan="3" style="text-align: center">Your Profile</th>
                    
                </tr>
                <tr>
                    <th width="30%">name</th>
                    <td width="5%">:</td>
                    <td><input type="text" name="name" value="<?php echo $result['name']?>"></td>
                </tr>
                <tr>
                    <th>address</th>
                    <td>:</td>
                    <td><input type="text" name="address" value="<?php echo $result['address'];?>"></td>
                </tr>
                <tr>
                    <th>email</th>
                    <td>:</td>
                    <td><input type="text" name="email" value="<?php echo $result['email'];?>"></td>
                </tr>
                <!-- --------------------------- -->
                <tr>
                    <th>Phone</th>
                    <td>:</td>
                    <td><input type="text" name="phone" value=""></td>
                </tr>
                <tr>
                    <th>Transection Id</th>
                    <td>:</td>
                    <td><input type="text" name="transid" value=""></td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>:</td>
                    <td><input type="number" name="amount" value=""></td>
                </tr>
                <tr>
                    <tr>
                    <td></td>
                    <td></td>
                    <td style=""><input type="submit" name="submit" Value="Pay" /></td>
                </tr>
                </tr>
            </table>
           </form>  
            <?php } } ?>    
        </div>      
       <div class="clear"></div>
    </div>
 </div>

<?php include 'design/footer.php' ?>
<?php include 'design/end.php' ?>