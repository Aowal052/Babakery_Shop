<?php
 	$filePath = realpath(dirname(__FILE__));
 ?>

 <?php  include_once ($filePath.'/../lib/Database.php');?>
 <?php include_once ($filePath.'/../helpers/Format.php');?>


<?php
class flavour{
	public $db;
    public $fm;

    public function __construct(){
       $this->db = new Database;
       $this->fm = new Format;
    }
	public function flavourInsert($flavour_name){
		$flavour_name = $this->fm->validation($flavour_name);
      	$flavour_name = mysqli_real_escape_string($this->db->link, $flavour_name);
      	if (empty($flavour_name)) {
	        $msg = "Flavour name must not be empty";
	        return $msg;
    	}else{
    		$query = "INSERT INTO tbl_flavour(flavour_name) VALUES ('$flavour_name')";
    		$result = $this->db->insert($query);
    		if ($result!=false) {
    			$msg = "Flavour name inserted successfully...";
	        	return $msg;
    		}
    	}
	}

	public function getAllflavour(){
		$query = "SELECT * FROM tbl_flavour ORDER BY flavour_id DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getflavourid($id){
		$query = "SELECT * FROM tbl_flavour WHERE flavour_id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function flavourUpdate($flavour_name, $id){
		$flavour_name = $this->fm->validation($flavour_name);
      	$flavour_name = mysqli_real_escape_string($this->db->link, $flavour_name);
      	$id 	  = mysqli_real_escape_string($this->db->link, $id);
      	if (empty($flavour_name)) {
	        $msg = "category name must not be empty";
	        return $msg;
		}else{
			$query = "UPDATE tbl_flavour
					SET
						flavour_name = '$flavour_name' WHERE
						flavour_id = $id";
			$update = $this->db->update($query);
			if ($update) {
				$msg = "flavour updated successfully...";
	        	return $msg;
			}else{
				$msg = "flavour name is not updated";
	        return $msg;
			}

		}
	}

	public function delflavourbyid($id){
		$query = "DELETE FROM tbl_flavour WHERE flavour_id='$id'";
		$delflavour = $this->db->delete($query);
		if($delflavour) {
				$msg = "flavour deleted successfully...";
	        	return $msg;
			}else{
				$msg = "flavour name is not deleted";
	        return $msg;
			}
	}


}
?>