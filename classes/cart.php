 <?php
 	$filePath = realpath(dirname(__FILE__));
 ?>

 <?php  include_once ($filePath.'/../lib/Database.php');?>
 <?php include_once ($filePath.'/../helpers/Format.php');?>

<?php
	class cart{
		public $db;
	    public $fm;

	    public function __construct(){
		   $this->db = new Database;
		   $this->fm = new Format;
    }
    public function addCart($id,$quantity){
    	$id 	  = mysqli_real_escape_string($this->db->link, $id);
    	$quantity 	  = mysqli_real_escape_string($this->db->link, $quantity);
    	$sid	  = session_id();

    	$query    = "SELECT * FROM tbl_product WHERE product_id = '$id'";
    			$result = $this->db->select($query)->fetch_assoc();
				$product_name = $result['product_name'];
				$price 		  = $result['price'];
				$image 		  = $result['image'];

		$chkquery = "SELECT * FROM tbl_cart WHERE product_id = $id AND ses_id = '$sid'";
    			$result = $this->db->select($chkquery);
    			if ($result!=false) {
    				$msg = "product already inserted";
    				return $msg;
    			}else{

		$query = "INSERT INTO tbl_cart(ses_id,product_id,product_name,price,quantity,image)VALUES('$sid','$id','$product_name','$price','$quantity','$image')";
	    		$result = $this->db->insert($query);
    			if ($result!=false) {
    			header("Location:cart.php"); 
	    		}else{
	    		header("location:404.php");
	    		}
	    	}
    }

    public function getCartPro(){
    	$sid = session_id();
    	$query  = "SELECT * FROM tbl_cart WHERE ses_id = '$sid'";
    	$result = $this->db->select($query);
    	return $result;
    }
    public function updateCartQuantity($cart_id,$quantity){
    	$cart_id 	  = mysqli_real_escape_string($this->db->link, $cart_id);
    	$quantity 	  = mysqli_real_escape_string($this->db->link, $quantity);

    	$query = "UPDATE tbl_cart
								SET
			    				quantity = '$quantity'
			    				WHERE cart_id = '$cart_id'";

			    	$result = $this->db->update($query);
		    		if ($result!=false) {
		    			header("Location:cart.php");
			    }else{
			    	$msg = "<span class = 'error'>cart updated is not successfully...</span>";
			        return $msg;
			    }

    }
	    public function delcartbyid($id){
	 	$query = "DELETE FROM tbl_cart WHERE cart_id='$id'";
	 	$delcat = $this->db->delete($query);
	 	if($delcat) {
	 			echo "<script>window.location = 'cart.php';</script>";
	 		}else{
	 			$msg = "cart name is not deleted";
	         return $msg;
	 		}
	 }
	 public function checkCartTable(){
	 	$sid = session_id();
    	$query  = "SELECT * FROM tbl_cart WHERE ses_id = '$sid'";
	 	$result = $this->db->select($query);
	 	return $result;
	 }
	 public function delcart(){
	 	$sid = session_id();
	 	$query = "DELETE FROM tbl_cart WHERE ses_id='$sid'";
	 	$result = $this->db->delete($query);
	 }

	 public function insertOrder($id){
	 	$sid 	= session_id();
    	$query  = "SELECT * FROM tbl_cart WHERE ses_id = '$sid'";
	 	$getpro = $this->db->select($query);
	 	if ($getpro) {
	 		while ($result=$getpro->fetch_assoc()) {
	 			$product_id   = $result['product_id'];
	 			$product_name = $result['product_name'];
	 			$quantity 	  = $result['quantity'];
	 			$price 		  = $result['price'] * $result['quantity'];
	 			$image 		  = $result['image'];

	 	$query = "INSERT INTO tbl_order(ses_id,product_id,product_name, quantity,price, image) 
	 							VALUES('$sid','$product_id','$product_name','$quantity','$price','$image')";
	    $result = $this->db->insert($query);
    			
	 		}
	 	}
	 }
	 public function payableAmount($id){
    	$query  = "SELECT price FROM tbl_order WHERE ses_id = '$id'";
	 	$result = $this->db->select($query);
	 	return $result;

	 }
	 public function getOdr($id){
	 	$query  = "SELECT * FROM tbl_order WHERE ses_id = '$id' ORDER BY date DESC";
	 	$getOdr = $this->db->select($query);
	 	return $getOdr;
	 }

	 public function chkOdr(){
	 	$sid = session_id();
    	$query  = "SELECT * FROM tbl_order WHERE ses_id = '$sid'";
	 	$result = $this->db->select($query);
	 	return $result;
	 }

	 public function getAllOrderProduct(){
	 	$sid = session_id();
    	$query  = "SELECT * FROM tbl_order ORDER BY date";
	 	$result = $this->db->select($query);
	 	return $result;
	 }
	 public function productShifted($id){
	 	$id = mysqli_real_escape_string($this->db->link, $id);
	 	$query = "UPDATE tbl_order
					SET
					status = '1'
					WHERE product_id = '$id'";

			    	$result = $this->db->update($query);
		    		if ($result!=false) {
		    			$msg = "order successfully done";
			    }else{
			    	$msg = "<span class = 'error'>order is not successfully...</span>";
			        return $msg;
			    }
	 }
	 public function delOdrbyid($id){
	 	$query = "DELETE FROM tbl_order WHERE order_id = '$id'";
	 	$result = $this->db->delete($query);
	 }
	 public function delOdr($id){
	 	$query = "DELETE FROM tbl_order WHERE product_id = '$id'";
	 	$result = $this->db->delete($query);
	 }
	 public function takePayment($data,$id){
	 	$name     = $this->fm->validation($data['name']);
    	$address  = $this->fm->validation($data['address']);
    	$email 	  = $this->fm->validation($data['email']);
    	$phone	  = $this->fm->validation($data['phone']);
    	$transid  = $this->fm->validation($data['transid']);
    	$amount 	  = $this->fm->validation($data['amount']);
 
    	$name 	= mysqli_real_escape_string($this->db->link, $data['name']);
    	$address 	= mysqli_real_escape_string($this->db->link, $data['address']);
    	$email 	= mysqli_real_escape_string($this->db->link, $data['email']);
    	$phone 	= mysqli_real_escape_string($this->db->link, $data['phone']);
    	$transid 	= mysqli_real_escape_string($this->db->link, $data['transid']);
    	$amount 	= mysqli_real_escape_string($this->db->link, $data['amount']);
    	if (empty($name) ||empty($address) ||empty($email)||empty($phone)||empty($transid)||empty($amount)) {
	       $img= "Field must not be empty";
	    	return $img;
        }

        $sid 	= session_id();
    	$query  = "SELECT * FROM tbl_cart WHERE ses_id = '$sid'";
	 	$getpro = $this->db->select($query);
	 	if ($getpro) {
	 		while ($result=$getpro->fetch_assoc()) {
	 			$product_id   = $result['product_id'];
	 			$product_name = $result['product_name'];
	 			$quantity 	  = $result['quantity'];
	 			$price 		  = $result['price'] * $result['quantity'];
	 			$image 		  = $result['image'];

        $query = "INSERT INTO tbl_order(ses_id,product_id,product_name, quantity,price, image,name,address,email,phone,transid,amount) VALUES('$sid','$product_id','$product_name','$quantity','$price','$image','$name','$address','$email','$phone','$transid','$amount')";
	    	$result = $this->db->insert($query);
    		if ($result!=false) {
    			
                header("location:bkash_success.php");
	    }else{
	    	$msg = "some error are occured!";
	        return $msg;
	    	}
    	}
	 
	 }

	}

}
?>