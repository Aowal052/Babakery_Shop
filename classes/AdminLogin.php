<?php include '/../lib/Session.php';?>
<?php Session::checkLogin();?>
<?php  include_once '/../lib/Database.php';?>
<?php include_once '/../helpers/Format.php';?>


<?php
  class AdminLogin{
    public $db;
    public $fm;

    public function __construct(){
       $this->db = new Database;
       $this->fm = new Format;
    }

    public function AdminLogin($adminUser,$adminPass){
      $adminUser = $this->fm->validation($adminUser);
      $adminPass = $this->fm->validation($adminPass);
      $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
      $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

      if (empty($adminUser) || empty($adminPass)) {
        $loginmsg = "filds must not be empty";
        return $loginmsg;
      }else{
        $query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";
        $result = $this->db->select($query);
        if ($result != false) {
            $value = $result->fetch_assoc();

            Session::set("AdminLogin",true);
            Session::set("adminId",$value['adminId']);
            Session::set("adminUser",$value['adminUser']);
            Session::set("adminName",$value['adminName']);
            //header("location:dasbord.php");
        }else{
          $loginmsg = "miss match occured";
          return $loginmsg;
        }
      }
    }

  }

?>