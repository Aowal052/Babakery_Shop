<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');
?>

<?php
	class customers{
		public $db;
	    public $fm;

	    public function __construct(){
		   $this->db = new Database;
		   $this->fm = new Format;
    }

    public function register($data){
    	$name     = $this->fm->validation($data['name']);
    	$address  = $this->fm->validation($data['address']);
    	$email 	  = $this->fm->validation($data['email']);
    	$pass	  = $this->fm->validation($data['pass']);
 
    	$name 	= mysqli_real_escape_string($this->db->link, $data['name']);
    	$address 	= mysqli_real_escape_string($this->db->link, $data['address']);
    	$email 	= mysqli_real_escape_string($this->db->link, $data['email']);
    	$pass 	= mysqli_real_escape_string($this->db->link, md5($data['pass']));
    	if (empty($name) ||empty($address) ||empty($email)||empty($pass)) {
	       $img= "Field must not be empty";
	    	return $img;
        }
        
        $mailquery = "SELECT * FROM customer WHERE email='$email' LIMIT 1";
        $result    =$this->db->select($mailquery);
        if ($result != false) {
        	$img= "Mail Allready Exist.";
    	    return $img;
        }else{
    	$query = "INSERT INTO customer(name,address,email,pass) VALUES('$name','$address','$email','$pass')";
	    	$result = $this->db->insert($query);
    		if ($result!=false) {
    			
                header("location:login.php");
	    }else{
	    	$msg = "some error are occured!";
	        return $msg;
	    	}
    	}

	}
	public function login($data){
		$email 	  = $this->fm->validation($data['email']);
		$password = $this->fm->validation(md5($data['pass']));
		$email 	  = mysqli_real_escape_string($this->db->link, $data['email']);
    	$password = mysqli_real_escape_string($this->db->link, md5($data['pass']));
    	if (empty($password)||empty($email)) {
    		$msg = "Fields must not be empty.";
    		return $msg;
    	}else{
    		$query = "SELECT * FROM customer WHERE email = '$email' AND pass='$password'";
			$result = $this->db->select($query);
			if ($result !=false) {
				$value = $result->fetch_assoc();
				Session::set("login",true);
				Session::set("id",$value['id']);
				Session::set("name",$value['name']);
				header("Location:cart.php");
			}else{
				$msg = "Your login infomation in not correct.";
    			return $msg;
			}
    	}
	}

    public function customerData($id){
        $query = "SELECT * FROM customer WHERE id = $id";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateProfile($data,$id){
        $name       = $this->fm->validation($data['name']);
        $address    = $this->fm->validation($data['address']);
        $email      = $this->fm->validation($data['email']);
 
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $address        = mysqli_real_escape_string($this->db->link, $data['address']);
        $email         = mysqli_real_escape_string($this->db->link, $data['email']);

        if (empty($name) ||empty($address) ||empty($email)) {
            $img= "Field must not be empty";
            return $img;
        }else{
        $query = "UPDATE customer
                                SET
                                name = '$name',
                                address = '$address',
                                email = '$email'
                                WHERE id = '$id'";

                    $result = $this->db->update($query);
                    if ($result!=false) {
                        $msg = "profile updated successfully...";
                        return $msg; 
                }else{
                    $msg = "profile is not updated";
                    return $msg;
                }
                
        }
    }
    public function customer($id){
        $id=session_id();
        $query = "SELECT * FROM customer WHERE id = $id";
        $result = $this->db->select($query);
        return $result;
    }

        public function feedback($data){
        $userName     = $this->fm->validation($data['userName']);
        $userEmail  = $this->fm->validation($data['userEmail']);
        $userPhone    = $this->fm->validation($data['userPhone']);
        $userMsg     = $this->fm->validation($data['userMsg']);
 
        $userName   = mysqli_real_escape_string($this->db->link, $data['userName']);
        $userEmail    = mysqli_real_escape_string($this->db->link, $data['userEmail']);
        $userPhone  = mysqli_real_escape_string($this->db->link, $data['userPhone']);
        $userMsg   = mysqli_real_escape_string($this->db->link, $data['userMsg']);
        if (empty($userName) ||empty($userEmail) ||empty($userPhone)||empty($userMsg)) {
           $img= "Field must not be empty";
            return $img;
        }
        $query = "INSERT INTO contact(name,email,mobile,message) VALUES('$userName','$userEmail','$userPhone','$userMsg')";
            $result = $this->db->insert($query);
            if ($result!=false) {
            $msg = "message send to the admin...";
            return $msg;
        }else{
            $msg = "some error are occured!";
            return $msg;
            }
        

    } 
    public function feedbackData(){
        $query = "SELECT * FROM contact";
        $result = $this->db->select($query);
        return $result;
    }
    public function showMsg($id){
        $query = "SELECT message,name FROM contact where id=$id";
        $result = $this->db->select($query);
        return $result;
    }
        
}

?>