<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');

class User {
	
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	public $skill1;
	public $skill2;
	public $skill3;
	public $image = "no image provided";
	public $email;
	public $work_title = "";
	public $overview = "";
	public $join_date; 
	public $user_location = 0;
	public $coins = 0;
	


	public static function find_all() {
		return self::find_by_sql("SELECT * FROM user");
  }
  
  public static function find_by_id($id=0) {
    $result_array = self::find_by_sql("SELECT * FROM user WHERE user_ID={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
  }
  
  public static function find_by_sql($sql="") {
    global $database;
    $result_set = $database->query($sql);
    $object_array = array();
    while ($row = $database->fetch_array($result_set)) {
      $object_array[] = self::instantiate($row);
    }
    return $object_array;
  }

	public static function authenticate($username="", $password="") {
    global $database;
    $username = $database->escape_value($username);
    $password = $database->escape_value($password);

    $sql  = "SELECT * FROM user ";
    $sql .= "WHERE username = '{$username}' ";
    $sql .= "AND password = '{$password}' ";
    $sql .= "LIMIT 1";
    $result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}
	
  public function full_name() {
    if(isset($this->first_name) && isset($this->last_name)) {
      return $this->first_name . " " . $this->last_name;
    } else {
      return "";
    }
  }
  
  
	
	//skills and feedbacks not done yet
	private static function instantiate($record) {
		// Could check that $record exists and is an array
    $object = new self;
		// Simple, long-form approach:
		$object->id 		= $record['user_ID'];
		$object->username 	= $record['username'];
		$object->password 	= $record['password'];
		$object->first_name = $record['first_name'];
		$object->last_name 	= $record['last_name'];
		$object->image 		= $record['image'];
		$object->email 		= $record['email'];
		$object->work_title = $record['work_title'];
		$object->overview 	= $record['overview'];
		$object->join_date 	= $record['join_date'];
		$object->user_location 	= $record['user_location'];
		$object->coins 		= $record['coins'];
		
		
		$object->skill1 	= $record['last_name'];
		$object->skill2 	= $record['last_name'];
		$object->skill3 	= $record['last_name'];
		
		return $object;
	}
	
	private function has_attribute($attribute) {
	  // get_object_vars returns an associative array with all attributes 
	  // (incl. private ones!) as the keys and their current values as the value
	  $object_vars = get_object_vars($this);
	  // We don't care about the value, we just want to know if the key exists
	  // Will return true or false
	  return array_key_exists($attribute, $object_vars);
	}
	
	public function save() {
	  // A new record won't have an id yet.
	  return isset($this->id) ? $this->update() : $this->create();
	}
	
	
	
	public function create() {
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key, key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
	  $sql = "INSERT INTO user (";
	  $sql .= "`first_name`, `last_name`, `image`, `username`, `email`, `password`, `work_title`, `overview`, `join_date`, `user_location`, `coins`";
	  $sql .= ") VALUES ('";
		$sql .= $database->escape_value($this->first_name) ."', '";
		$sql .= $database->escape_value($this->last_name) ."', '";
		$sql .= $database->escape_value($this->image) ."', '";
		$sql .= $database->escape_value($this->username) ."', '";
		$sql .= $database->escape_value($this->email) ."', '";
		$sql .= $database->escape_value($this->password) ."', '";
		$sql .= $database->escape_value($this->work_title) ."', '";
		$sql .= $database->escape_value($this->overview) ."', ";
		$sql .= "CURRENT_TIMESTAMP,'";
		$sql .= $database->escape_value($this->user_location) ."', '";
		$sql .= $database->escape_value($this->coins) ."')";
	  if($database->query($sql)) {
	    $this->id = $database->insert_id();
	    return true;
	  } else {
	    return false;
	  }
	}
	// also creat one named get_user_skills
	public function get_user_location() {
		
			global $database;
			$sql = "SELECT * from location ";
			$sql .= " WHERE location_ID =  {$this->user_location} LIMIT 1";
			$result_array = $database->query_array($sql);
			//return $result_array['location'];
			if (!empty($result_array)) {
				//var_dump($result_array);
				//echo mysql_num_rows($result_array);
				return $result_array['location'];
				//echo $arr;
				//echo $arr->location;
				//print_r ($arr);
				//return $arr[0]->location;
			} 
			else {return false;}
			//return $database->query($sql);
		//if ($arr->location; !=0){}
		//else{return"Location not Selected";}
	}
	//zAIDI KA WO BUTTON KIS KIS KO UPDATE KARNA ALLOW KAREGA
	public function update() {
	  global $database;
		$sql = "UPDATE users SET ";
		$sql .= "username='". $database->escape_value($this->username) ."', ";
		$sql .= "password='". $database->escape_value($this->password) ."', ";
		$sql .= "first_name='". $database->escape_value($this->first_name) ."', ";
		$sql .= "last_name='". $database->escape_value($this->last_name) ."' ";
		$sql .= "WHERE id=". $database->escape_value($this->id);
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete() {
		global $database;
	  $sql = "DELETE FROM users ";
	  $sql .= "WHERE id=". $database->escape_value($this->id);
	  $sql .= " LIMIT 1";
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	
		// NB: After deleting, the instance of User still 
		// exists, even though the database entry does not.
		// This can be useful, as in:
		//   echo $user->first_name . " was deleted";
		// but, for example, we can't call $user->update() 
		// after calling $user->delete().
	}

	
}

?>