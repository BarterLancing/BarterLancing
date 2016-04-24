<?php
require_once('database.php');

class Barter {
	
	public $barter_id;
	public $user_id ;
	public $job_title = "";
	public $job_description = "";
	public $job_location = "";
	public $job_start;
	public $coins_offered = 0;
	public $coins_demanded = 0;
	public $required_skill1="Skill not added";
	public $required_skill2="Skill not added";
	public $required_skill3="Skill not added";
	public $offered_skill1="Skill not added";
	public $offered_skill2="Skill not added";
	public $offered_skill3="Skill not added";


	public static function find_all() {
		return self::find_by_sql("SELECT * FROM job");
  }
  
  public static function find_by_id($id=0) {
    $result_array = self::find_by_sql("SELECT * FROM job WHERE job_ID={$id} LIMIT 1");
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

	
	//correct the attributes
	/*private static function instantiate_barter($record) {
		// Could check that $record exists and is an array
		$object = new self;
		// Simple, long-form approach:
		$object->id 		= $record['user_ID'];
		$object->username 	= $record['username'];
		$object->password 	= $record['password'];
		$object->first_name = $record['first_name'];
		$object->last_name 	= $record['last_name'];
		
		
		return $object;
	}*/
	
	//same as above
	private function has_attribute($attribute) {
	  $object_vars = get_object_vars($this);
	  return array_key_exists($attribute, $object_vars);
	}
	
	/*public function save() {
	  // A new record won't have an id yet.
	  return isset($this->id) ? $this->update() : $this->create();
	}*/
	
	
	public function create() {
		global $database;
		// - escape all values to prevent SQL injection
		$sql = "INSERT INTO job (";
		$sql .= "`user_ID`, `job_title`, `job_description`, `job_location`, `job_start`, `return_skill1`, `return_skill2`, `return_skill3`, `required_skill1`, `required_skill2`, `required_skill3`, `coins_offered`, `coins_required` ";
		$sql .= ") VALUES ('";
		$sql .= $database->escape_value($this->user_id) ."', '";
		$sql .= $database->escape_value($this->job_title) ."', '";
		$sql .= $database->escape_value($this->job_description) ."', '";
		$sql .= $database->escape_value($this->job_location) ."', ";
		$sql .= "CURRENT_TIMESTAMP,'";
		$sql .= $database->escape_value($this->offered_skill1) ."', '";
		$sql .= $database->escape_value($this->offered_skill2) ."', '";
		$sql .= $database->escape_value($this->offered_skill3) ."', '";
		$sql .= $database->escape_value($this->required_skill1) ."', '";
		$sql .= $database->escape_value($this->required_skill2) ."', '";
		$sql .= $database->escape_value($this->required_skill3) ."', '";
		$sql .= $database->escape_value($this->coins_offered) ."', '";
		$sql .= $database->escape_value($this->coins_demanded) ."')";
		
		
		//$database->query($sql);
		//check at postpage
		if($database->query($sql)) {
	    $this->barter_id = $database->insert_id();
	    return true;
		} else {
	    return false;
		}
	  
	  
	  
		//adds the required skill into respective databases:-
		/*
		if ($this->required_skill1 != 0){
		$sql_req_skill1 = "INSERT INTO job_required_skill (";
		$sql_req_skill1 .= "`job_ID`, `skill_ID`";
		$sql_req_skill1 .= ") VALUES ('";
		$sql_req_skill1 .= $database->escape_value($this->barter_id) ."', '";
		$sql_req_skill1 .= $database->escape_value($this->$required_skill1) ."')";
		$database->query($sql_req_skill1);
		
		}
		
		if ($this->required_skill2 != 0){
		$sql_req_skill2 = "INSERT INTO job_required_skill (";
		$sql_req_skill2 .= "`job_ID`, `skill_ID`";
		$sql_req_skill2 .= ") VALUES ('";
		$sql_req_skill2 .= $database->escape_value($this->barter_id) ."', '";
		$sql_req_skill2 .= $database->escape_value($this->$required_skill2) ."')";
		$database->query($sql_req_skill2);
		
		}
		
		if ($this->required_skill3 != 0){
		$sql_req_skill3 = "INSERT INTO job_required_skill (";
		$sql_req_skill3 .= "`job_ID`, `skill_ID`";
		$sql_req_skill3 .= ") VALUES ('";
		$sql_req_skill3 .= $database->escape_value($this->barter_id) ."', '";
		$sql_req_skill3 .= $database->escape_value($this->$required_skill3) ."')";
		$database->query($sql_req_skill3);
		
		}
	
	//add the offered skills skill into respective databases:-
	
		if ($this->offered_skill1 != 0){
		$sql_off_skill1 = "INSERT INTO job_return_skill (";
		$sql_off_skill1 .= "`job_ID`, `skill_ID`";
		$sql_off_skill1 .= ") VALUES ('";
		$sql_off_skill1 .= $database->escape_value($this->barter_id) ."', '";
		$sql_off_skill1 .= $database->escape_value($this->$offered_skill1) ."')";
		$database->query($sql_off_skill1);
		
		}
		
		if ($this->offered_skill2 != 0){
		$sql_off_skill2 = "INSERT INTO job_return_skill (";
		$sql_off_skill2 .= "`job_ID`, `skill_ID`";
		$sql_off_skill2 .= ") VALUES ('";
		$sql_off_skill2 .= $database->escape_value($this->barter_id) ."', '";
		$sql_off_skill2 .= $database->escape_value($this->$offered_skill2) ."')";
		$database->query($sql_off_skill2);
		
		}
	
		if ($this->offered_skill3 != 0){
		$sql_off_skill3 = "INSERT INTO job_return_skill (";
		$sql_off_skill3 .= "`job_ID`, `skill_ID`";
		$sql_off_skill3 .= ") VALUES ('";
		$sql_off_skill3 .= $database->escape_value($this->barter_id) ."', '";
		$sql_off_skill3 .= $database->escape_value($this->$offered_skill3) ."')";
		$database->query($sql_off_skill3);
		
		}*/
	
	
	}

	//needs a zaidi setting button to update
	/*public function update() {
	  global $database;
		$sql = "UPDATE jobs SET ";
		
		$sql .= "username='". $database->escape_value($this->username) ."', ";
		$sql .= "password='". $database->escape_value($this->password) ."', ";
		$sql .= "first_name='". $database->escape_value($this->first_name) ."', ";
		$sql .= "last_name='". $database->escape_value($this->last_name) ."' ";
		$sql .= "WHERE id=". $database->escape_value($this->id);
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	}*/

	
	
	public function delete() {
		global $database;
		$sql = "DELETE FROM job ";
	  $sql .= "WHERE job_ID=". $database->escape_value($this->id);
	  $sql .= " LIMIT 1";
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	
		
	}

	
}

?>