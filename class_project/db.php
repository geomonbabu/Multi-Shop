<?php
 class Database 
 {
    private $servername = "localhost";
    private $username   = "root";
    private $password   = "";
    private $dbname = "class_project";
    public $con;
    public $table = "user";
   


    public function __construct(){
        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    } 


      //Insert into table

      public function insert($name,$email,$contact)
      {
         $sql = "INSERT INTO $this->table (name,email,contact) VALUES('$name','$email',$contact)";
         $query = $this->con->query($sql);
         if ($query) {
            return true;
        }
        else{
            return false;
        }
      }


      public function verify($email)
      {
         $query = "SELECT * FROM $this->table WHERE email = '$email'";
         $result = $this->con->query($query);
         if ($result->num_rows > 0){
			// $row = $result->fetch_assoc();
			// echo $row['id'],$row['name'],$row['phone'],$row['email'];
		    // }
			// $data = array();
         while ($row = $result->fetch_assoc()) {
            $data = $row;
		   }
			$json=json_encode($data);
         echo $json;
      }
      else{
         echo'0';
      }
   }

   public function update($user_id,$name,$email,$contact){
      $query = "UPDATE $this->table SET name='$name',email='$email',contact ='$contact' WHERE user_id='$user_id'";
      $result=$this->con->query($query);
      if($result)
      {
        echo "Update";
      } 
    else
     {
        echo "Fail";
      }
      
   }

   public function delete($user_id)
      {
         $sql = "DELETE FROM $this->table WHERE user_id = '$user_id'";
         $query = $this->con->query($sql);
         if ($query) {
            return true;
         }else{
            return false;
         }
      }
 }
 ?>












