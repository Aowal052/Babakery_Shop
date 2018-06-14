<?php
 	$filePath = realpath(dirname(__FILE__));
 //	echo $filePath;
 ?>
<?php  include_once ($filePath.'/../lib/Database.php');?> 
 <?php include_once ($filePath.'/../helpers/Format.php');?>


<?php
class addcategory{
	public $db;
    public $fm;

    public function __construct(){
       $this->db = new Database;
       $this->fm = new Format;
    }
    public function catInsert($cat_name){
    	$cat_name = $this->fm->validation($cat_name);
      	$cat_name = mysqli_real_escape_string($this->db->link, $cat_name);
      	if (empty($cat_name)) {
	        $msg = "category name must not be empty";
	        return $msg;
    	}else{
    		$query = "INSERT INTO tbl_category(cat_name) VALUES ('$cat_name')";
    		$result = $this->db->insert($query);
    		if ($result!=false) {
    			$msg = "category inserted successfully...";
	        	return $msg;
    		}
    	}
	}

	public function getAllCat(){
		$query = "SELECT * FROM tbl_category ORDER BY cat_id DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getcatid($id){
		$query = "SELECT * FROM tbl_category WHERE cat_id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function catupdate($cat_name, $id){
		$cat_name = $this->fm->validation($cat_name);
      	$cat_name = mysqli_real_escape_string($this->db->link, $cat_name);
      	$id 	  = mysqli_real_escape_string($this->db->link, $id);
      	if (empty($cat_name)) {
	        $msg = "category name must not be empty";
	        return $msg;
		}else{
			$query = "UPDATE tbl_category
					SET
						cat_name = '$cat_name' WHERE
						cat_id = $id";
			$update = $this->db->update($query);
			if ($update) {
				$msg = "category updated successfully...";
	        	return $msg;
			}else{
				$msg = "category name not updated";
	        return $msg;
			}

		}

	}

	public function delcatbyid($id){
		$query = "DELETE FROM tbl_category WHERE cat_id='$id'";
		$delcat = $this->db->delete($query);
		if($delcat) {
				$msg = "category deleted successfully...";
	        	return $msg;
			}else{
				$msg = "category name is not deleted";
	        return $msg;
			}
	}


}
?>