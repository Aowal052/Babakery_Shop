 <?php
 	$filePath = realpath(dirname(__FILE__));
 ?>

 <?php  include_once ($filePath.'/../lib/Database.php');?>
 <?php include_once ($filePath.'/../helpers/Format.php');?>


<?php
class product {
	public $db;
    public $fm;

    public function __construct(){
       $this->db = new Database;
       $this->fm = new Format;
    }

    public function insertProduct($data, $file){
    	$product_name = $this->fm->validation($data['product_name']);
    	$cat_id 	  = $this->fm->validation($data['cat_id']);
    	$flavour_id 	  = $this->fm->validation($data['flavour_id']);
    	$body		  = $this->fm->validation($data['body']);
    	$price		  = $this->fm->validation($data['price']);
    	$type		  = $this->fm->validation($data['type']);
 
    	$product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);
    	$cat_id 	  = mysqli_real_escape_string($this->db->link, $data['cat_id']);
    	$flavour_id   = mysqli_real_escape_string($this->db->link, $data['flavour_id']);
    	$body 		  = mysqli_real_escape_string($this->db->link, $data['body']);
    	$price 		  = mysqli_real_escape_string($this->db->link, $data['price']);
    	$type 		  = mysqli_real_escape_string($this->db->link, $data['type']);

    	$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "uploads/".$unique_image;

	    if (empty($product_name) ||empty($cat_id) ||empty($flavour_id) ||empty($body) ||empty($price) ||empty($file_name)||empty($type)) {
	    	$img= "Field must not be empty";
	    	return $img;
	    }
	    elseif ($file_size >1048567) {
     	echo "<span class='error'>Image Size should be less then 1MB!</span>";
    	} elseif (in_array($file_ext, $permited) === false) {
     	echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
    }else{
	    	move_uploaded_file($file_temp, $uploaded_image);
	    	$query = "INSERT INTO tbl_product(product_name, cat_id,flavour_id,body,price, image, type) VALUES('$product_name','$cat_id','$flavour_id','$body','$price','$uploaded_image','$type')";
	    	$result = $this->db->insert($query);
    		if ($result!=false) {
    			$msg = "product inserted successfully...";
	        	return $msg; 
	    }else{
	    	$msg = "product is not inserted";
	        return $msg;
	    }

    }
	}

	public function getAllproducts(){
		$query = "SELECT tbl_product.*,tbl_category.cat_name,tbl_flavour.flavour_name
		FROM tbl_product
		INNER JOIN tbl_category
		ON tbl_product.cat_id=tbl_category.cat_id
		INNER JOIN tbl_flavour
		ON tbl_product.flavour_id=tbl_flavour.flavour_id
		ORDER BY product_id DESC";
		// $query = "SELECT * FROM tbl_product ORDER BY product_id DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getproductid($id){
		$query = "SELECT * FROM tbl_product WHERE product_id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function updateProduct($data, $file, $id){
		$product_name = $this->fm->validation($data['product_name']);
    	$cat_id 	  = $this->fm->validation($data['cat_id']);
    	$brand_id 	  = $this->fm->validation($data['brand_id']);
    	$body		  = $this->fm->validation($data['body']);
    	$price		  = $this->fm->validation($data['price']);
    	$type		  = $this->fm->validation($data['type']);
 
    	$product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);
    	$cat_id 	  = mysqli_real_escape_string($this->db->link, $data['cat_id']);
    	$brand_id 	  = mysqli_real_escape_string($this->db->link, $data['brand_id']);
    	$body 		  = mysqli_real_escape_string($this->db->link, $data['body']);
    	$price 		  = mysqli_real_escape_string($this->db->link, $data['price']);
    	$type 		  = mysqli_real_escape_string($this->db->link, $data['type']);

    	$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "uploads/".$unique_image;

	    if (empty($product_name) ||empty($cat_id) ||empty($brand_id) ||empty($body) ||empty($price) ||empty($type)) {
	    	$img= "Field must not be empty";
	    	return $img;
	    }else{
	    	if (!empty($file_name)) {

			    if ($file_size >1048567) {
		     	echo "<span class='error'>Image Size should be less then 1MB!</span>";
		    	} elseif (in_array($file_ext, $permited) === false) {
		     	echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
		   		 }else{
			    	move_uploaded_file($file_temp, $uploaded_image);
			    	$query = "UPDATE tbl_product
								SET
			    				product_name = '$product_name',
			    				cat_id = '$cat_id',
			    				flavour_id = '$flavour_id',
			    				body = '$body',
			    				price = '$price',
			    				image = '$uploaded_image',
			    				type = '$type'
			    				WHERE product_id = '$id'";

			    	$result = $this->db->update($query);
		    		if ($result!=false) {
		    			$msg = "product updated successfully...";
			        	return $msg; 
			    }else{
			    	$msg = "product is not updated";
			        return $msg;
			    }

		    }
		}else{
				$query = "UPDATE tbl_product
								SET
			    				product_name = '$product_name',
			    				cat_id = '$cat_id',
			    				brand_id = '$brand_id',
			    				body = '$body',
			    				price = '$price',
			    				type = '$type'
			    				WHERE product_id = '$id'";

			    	$result = $this->db->update($query);
		    		if ($result!=false) {
		    			$msg = "product updated successfully...";
			        	return $msg; 
			    }else{
			    	?>
			    	<span style="color: red";>$msg = "product is not updated";</span>
			    	<?php
			        return $msg;
			    }

		    }
		}
	}
	public function delproductid($id){
		$query = "SELECT * FROM tbl_product WHERE product_id='$id'";
		$getdat = $this->db->select($query);
		if($getdat) {
				while ($delimg=$getdat->fetch_assoc()) {
					$dellink  = $delimg['image'];
					unlink($dellink);
				}
			}
		$query = "DELETE FROM tbl_product WHERE product_id='$id'";
		$delpro = $this->db->delete($query);
		if($delpro) {
				$msg = "product deleted successfully...";
	        	return $msg;
			}else{
				$msg = "product name is not deleted";
	        return $msg;
			}
	}

	public function getFeaturPro(){
		$query = "SELECT * FROM tbl_product WHERE type ='1' ORDER BY product_id DESC LIMIT 3";
		$result = $this->db->select($query);
		return $result;
	}
	public function getNewPro(){
		$query = "SELECT * FROM tbl_product WHERE type ='2' ORDER BY product_id DESC LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}
	public function getSproduct($id){
		// Session::set("product",true);
  //       Session::set("product_id",$value['product_id']);
		$query = "SELECT tbl_product.*,tbl_category.cat_name,tbl_flavour.flavour_name
		FROM tbl_product
		INNER JOIN tbl_category
		ON tbl_product.cat_id=tbl_category.cat_id
		INNER JOIN tbl_flavour
		ON tbl_product.flavour_id=tbl_flavour.flavour_id
		AND tbl_product.product_id = '$id'";

		$result = $this->db->select($query);
		return $result;
	}

	public function relatedProduct($id){
		$query = "SELECT * FROM tbl_product WHERE flavour_id ='$id' ORDER BY product_id LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}
	// public function letestFromSamsung(){
	// 	$query = "SELECT * FROM tbl_product WHERE flavour_id ='$id' ORDER BY product_id LIMIT 1";
	// 	$result = $this->db->select($query);
	// 	return $result;
	// }
	// public function letestFromACER(){
	// 	$query = "SELECT * FROM tbl_product WHERE flavour_id ='$id' ORDER BY product_id LIMIT 1";
	// 	$result = $this->db->select($query);
	// 	return $result;
	// }
	// public function letestFromCANON(){
	// 	$query = "SELECT * FROM tbl_product WHERE brand_id ='8' ORDER BY product_id LIMIT 1";
	// 	$result = $this->db->select($query);
	// 	return $result;
	// }
	public function productbycat($id){
		$id	= $this->fm->validation($id);
    	$id = mysqli_real_escape_string($this->db->link, $id);
		$query = "SELECT * FROM tbl_product WHERE cat_id='$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function search_result($data){

        $query = "SELECT * FROM tbl_product WHERE product_name LIKE '%$data%' ORDER BY product_id DESC";
        $result = $this->db->select($query);
        return $result;
                  
	}

}

?>