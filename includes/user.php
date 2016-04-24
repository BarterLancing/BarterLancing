<?php
require_once('database.php');

class User {
	
	public $id;
	public $username = "";
	public $password = "";
	public $first_name = "";
	public $last_name = "";
	public $skill1 = "No Skill";
	public $skill2 = "No Skill";
	public $skill3 = "No Skill";
	public $image = "no image provided";
	public $email = "";
	public $work_title = "";
	public $overview = "";
	public $join_date; 
	public $user_location = "";
	public $coins = 10;
	


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
    $sql .= "WHERE ( username = '{$username}' OR email = '{$username}' ) ";
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
  
  
	
	private static function instantiate($record) {
		$object = new self;
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
		$object->skill1 	= $record['skill1'];
		$object->skill2 	= $record['skill2'];
		$object->skill3 	= $record['skill3'];
		
		return $object;
	}
	
	private function has_attribute($attribute) {
	  // get_object_vars returns an associative array with all attributes 
	  $object_vars = get_object_vars($this);
	  // We don't care about the value, we just want to know if the key exists
	  // Will return true or false
	  return array_key_exists($attribute, $object_vars);
	}
	
	/*public function save() {
	  // A new record won't have an id yet.
	  return isset($this->id) ? $this->update() : $this->create();
	}*/
	
	
	
	public function create() {
		global $database;
		// - escape all values to prevent SQL injection
		$sql = "INSERT INTO user ( ";
		$sql .= "`first_name`, `last_name`, `image`, `username`, `email`, `password`, `work_title`, `overview`, `skill1`, `skill2`, `skill3`, `join_date`, `user_location`, `coins` ";
		$sql .= ") VALUES ('";
		$sql .= $database->escape_value($this->first_name) ."', '";
		$sql .= $database->escape_value($this->last_name) ."', '";
		$sql .= $database->escape_value($this->image) ."', '";
		$sql .= $database->escape_value($this->username) ."', '";
		$sql .= $database->escape_value($this->email) ."', '";
		$sql .= $database->escape_value($this->password) ."', '";
		$sql .= $database->escape_value($this->work_title) ."', '";
		$sql .= $database->escape_value($this->overview) ."', '";
		$sql .= $database->escape_value($this->skill1) ."', '";
		$sql .= $database->escape_value($this->skill2) ."', '";
		$sql .= $database->escape_value($this->skill3) ."', ";
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
	
	/*public function get_user_location() {
		
			global $database;
			$sql = "SELECT * from location ";
			$sql .= " WHERE location_ID =  {$this->user_location} LIMIT 1";
			$result_array = $database->query_array($sql);
			if (!empty($result_array)) {
				return $result_array['location'];
				
			} 
			else {return false;}
			
	}*/
	
	
	public function get_user_location() {
		
			global $database;
			$sql = "SELECT user_location from user ";
			$sql .= " WHERE user_ID =  {$this->id} LIMIT 1";
			$result_array = $database->query_array($sql);
			if (!empty($result_array)) {
				return $result_array[0];
				
			} 
			else {return false;}
			
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
	  $sql = "DELETE FROM user ";
	  $sql .= "WHERE user_ID=". $database->escape_value($this->id);
	  $sql .= " LIMIT 1";
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	}

	public function get_user_feedbacks() {
		
			global $database;
			$sql = "SELECT * from feedback ";
			$sql .= " WHERE user_ID =  {$this->id} ";
			$result_array = $database->query($sql);
			if (!empty($result_array)) {
				while ($row = $database->fetch_array($result_array)) 
					{
					$feedbacker = $database->query("SELECT user_ID,first_name FROM user WHERE user_ID = {$row['feedbacker_ID']} LIMIT 1");
					$feedbacker2 = $database->fetch_array($feedbacker);
					$job = $database->query("SELECT job_title FROM job WHERE job_ID = {$row['job_ID']} LIMIT 1");
					$jobname = $database->fetch_array($job);
					
					echo ("<li>");
					echo ("Feedback : {$row['feedback']}");
					echo ("<br/>By : <a href='profile2.php?other_user_id={$feedbacker2[0]}' >{$feedbacker2[1]}</a>");
					echo ("<br/>On : {$row['date']}");
					echo ("<br/>Job : {$jobname[0]}");
					echo("</li>");
					}
			} 
			else {return false;}
			
	}
	
	public function get_user_skills_on_profile() {
		
			echo ("<span class='label label-skill'>");
			echo (" {$this->skill1} ");
			echo("</span>");
			echo ("<span class='label label-skill'>");
			echo (" {$this->skill2} ");
			echo("</span>");
			echo ("<span class='label label-skill'>");
			echo (" {$this->skill3} ");
			echo("</span>");
			
	}
	
	public function get_user_skills_for_mainPage() {
		
			echo ("<li><span class='glyphicon glyphicon-chevron-right'></span><a href='#'>");
			echo (" {$this->skill1} ");
			echo("</a></li>");
			echo ("<li><span class='glyphicon glyphicon-chevron-right'></span><a href='#'>");
			echo (" {$this->skill2} ");
			echo("</a></li>");
			echo ("<li><span class='glyphicon glyphicon-chevron-right'></span><a href='#'>");
			echo (" {$this->skill3} ");
			echo("</a></li>");
			
	}
	
	public function get_user_jobs_for_mainPage() {
		
			global $database;
			$sql = "SELECT * from job ";
			$sql .= " WHERE ( client_completion=-1 AND applicant_completion=-1 AND( (required_skill1 LIKE  '{$this->skill1}' ) OR (required_skill1 LIKE '{$this->skill2}' ) OR (required_skill1 LIKE  '{$this->skill3}' ) ) OR ";
			$sql .= "  ( (required_skill2 LIKE  '{$this->skill1}' ) OR (required_skill2 LIKE  '{$this->skill2}' ) OR (required_skill2 LIKE '{$this->skill3}' ) ) OR ";
			$sql .= "  ( (required_skill3 LIKE  '{$this->skill1}' ) OR (required_skill3 LIKE '{$this->skill2}' ) OR (required_skill3 LIKE '{$this->skill3}') ) ) ";
			$result_array = $database->query($sql);
			//return $result_array['location'];
			if (!empty($result_array) AND mysql_num_rows($result_array)!=0) {
				while ($row = $database->fetch_array($result_array)) 
					{
					$job_poster = $database->query("SELECT first_name FROM user WHERE user_ID = {$row['user_ID']} LIMIT 1");
					$job_poster2 = $database->fetch_array($job_poster);
					
					echo("	<div class='col-sm-10'> ");
					echo("		<h4> ");
					echo("			<span class='username'><a href='single_job_page.php?job_ID={$row['job_ID']}'>{$row['job_title']}</a> </span> ");
					echo("				<a href='profile2.php?other_user_id={$row['user_ID']}' ><label class='label label-info'>{$job_poster2[0]}</label></a> ");
					echo("			</h4> ");
					echo("			<h5>  ");
					echo("			<i class='fa fa-calendar'></i> ");
					echo("			{$row['job_start']}  ");
					echo("			</h5> ");
					echo("			<p class='description'>{$row['job_description']}</p>  ");   
					echo("		</div> ");
					echo("		<div class='col-sm-2' data-no-turbolink=''> ");
					echo("			<a class='btn btn-info btn-download btn-flat pull-right makeLoading' href='single_job_page.php?job_ID={$row['job_ID']}'> ");
					echo("			<i class='fa fa-share'></i> View Job ");
					echo("			</a>   ");          
					echo("		</div> ");
					}
			} 
			else {echo("<center><h3>No Barters to show at the moment</h3></center>");}
			
	}
	

	public function show_completed_barter() {
	
		global $database;
		$sql = "SELECT * from job ";
		$sql .= " WHERE (client_completion={$this->id} OR applicant_completion={$this->id}) ";
		$result_array = $database->query($sql);
		//return $result_array['location'];
		if (!empty($result_array) AND mysql_num_rows($result_array)!=0) {
			while ($row = $database->fetch_array($result_array)) 
				{
				$job = $database->query("SELECT * FROM job WHERE job_ID = {$row['job_ID']} LIMIT 1");
				$job2 = $database->fetch_array($job);
				
				echo("	<div class='col-sm-10'> ");
				echo("		<h3><a href='single_job_page.php?job_ID={$job2['job_ID']}' class='username'>{$job2['job_title']}</a> </h3>");
				echo("			<h5>  ");
				echo("			<i class='fa fa-calendar'></i> ");
				echo("			{$job2['job_start']}  ");
				echo("			</h5> ");
				echo("			<p class='description'>{$job2['job_description']}</p>  ");   
				echo("		</div> ");
				echo("		<div class='col-sm-2' data-no-turbolink=''> ");
				echo("			<a class='btn btn-info btn-download btn-flat pull-right makeLoading' href='single_job_page.php?job_ID={$job2['job_ID']}'> ");
				echo("			<i class='fa fa-share'></i> View Job ");
				echo("			</a>   ");          
				echo("		</div> ");
				
				
				
				echo ("<label class='col-lg-12 control-label-overview'>");
				echo ("<ol type='1'>");
				
				$sql2 = "SELECT * from feedback ";
				$sql2 .= " WHERE job_ID =  {$job2['job_ID']} ";
				$result_array2 = $database->query($sql2);
				//return $result_array['location'];
				if (!empty($result_array2)) {
					while ($row2 = $database->fetch_array($result_array2)) 
						{
						$feedbacker = $database->query("SELECT user_ID,first_name FROM user WHERE user_ID = {$row2['feedbacker_ID']} LIMIT 1");
						$feedbacker2 = $database->fetch_array($feedbacker);
						echo ("<li>");
						echo ("Feedback : {$row2['feedback']}");
						echo ("<br/>By : <a href='profile2.php?other_user_id={$feedbacker2[0]}' >{$feedbacker2[1]}</a>");
						echo ("<br/>On : {$row2['date']}");
						echo("</li>");
						
						
						}		
					
					}	
				echo ("</ol>");
				echo ("</label>	");		
				}
		} 
		else {echo("<br><br><br><center><h4>No Completed Barters to show</h4></center><br><br><br>");}
		
}
	

	public function show_posted_barter() {
		
			global $database;
			//echo("barter showing");
			$sql = "SELECT * from job ";
			$sql .= " WHERE (user_ID =  {$this->id} AND client_completion=-1) ";
			$result_array = $database->query($sql);
			if (!empty($result_array) AND mysql_num_rows($result_array)!=0) {
				while ($row = $database->fetch_array($result_array)) 
					{
					echo (" <div class='container'> ");
					echo (" <div class='container'> ");
					echo (" <div class='col-md-10 col-md-offset-1'> ");
						
					
					
					echo("	<div class='col-sm-10'> ");
					echo("		<h4> ");//set the var down
					echo("			<a href='single_job_page.php?job_ID={$row['job_ID']}' class='username'>{$row['job_title']}</a> ");
					echo("			</h4> ");
					echo("			<h5>  ");
					echo("			<i class='fa fa-calendar'></i> ");
					echo("			{$row['job_start']}  ");
					echo("			</h5> ");
					echo("			<p class='description'>{$row['job_description']}</p>  ");   
					echo("		</div> ");
					echo("		<div class='col-sm-2' data-no-turbolink=''> ");
					echo("			<a class='btn btn-info btn-download btn-flat pull-right makeLoading' href='single_job_page.php?job_ID={$row['job_ID']}'> ");
					echo("			<i class='fa fa-share'></i> View Job ");
					echo("			</a>   ");          
					echo("		</div> ");
					
					
					
					echo("	<div class='col-md-10'> ");
					echo (" <hr><center><h4>Proposals</h4></center> ");
													
					//approved proposals
					$sql3 = "SELECT * from proposal ";
					$sql3 .= " WHERE (job_ID =  {$row['job_ID']} AND status=1)";
					$result_array3 = $database->query($sql3);
					//all proposals
					$sql2 = "SELECT * from proposal ";
					$sql2 .= " WHERE (job_ID =  {$row['job_ID']} AND status=0)";
					$result_array2 = $database->query($sql2);
					if (!empty($result_array3)) {
						//echo("approved proposals not empty");
						$count=0;
						while ($row3 = $database->fetch_array($result_array3)) 
							{
							$count++;
							$proposer = $database->query(" SELECT user_ID,first_name FROM user WHERE user_ID = {$row3['user_ID']} ");
							$proposer2 = $database->fetch_array($proposer);
									echo (" <div class='col-md-10 col-md-offset-1'> ");
					
									echo (" <h4><a href='profile2.php?user_ID={$proposer2[0]}'>{$proposer2[1]}</a></h4> ");
									echo (" <pre> ");
									echo (" {$row3['proposal']} ");
									
									echo (" </pre> ");

									echo (" <div class='col-md-5 col-sm-offset-3'> ");
									echo ("   <a href='single_job_page.php?client_completion={$row['job_ID']}'><button class='btn btn-block btn-lg btn-success'>Mark As Complete</a></button> ");
									echo (" </div> ");
									 
									//if you want to mark incomplete
									//echo (" <div class='col-md-3 '> ");
									//echo (" 	<button class='col-sm-10 btn btn-lg btn-danger'><a href='myBarters.php?proposal_for={$row['job_ID']}&proposal_by={$proposer2[0]}&proposal_status=-1'>Deny</a></button> ");
									//echo (" </div> "); 
						
									echo (" </div> ");
							}		
						//echo($count);
					
					}if ($count<1) {
						while ($row2 = $database->fetch_array($result_array2)) 
							{
							$proposer = $database->query(" SELECT user_ID,first_name FROM user WHERE user_ID = {$row2['user_ID']} ");
							$proposer2 = $database->fetch_array($proposer);
									echo (" <div class='col-md-10 col-md-offset-1'> ");
					
									echo (" <h5>{$proposer2[1]}</h5> ");
									echo (" <pre> ");
									echo (" {$row2['proposal']} ");
									
									echo (" </pre> ");

									echo (" <div class='col-sm-3 col-sm-offset-3'> ");
									echo ("   <button class='btn btn-block btn-lg btn-success'><a href='myBarters.php?proposal_for={$row['job_ID']}&proposal_by={$proposer2[0]}&proposal_status=1' >Approve</a></button> ");
									echo (" </div> ");
									 
									echo (" <div class='col-md-3 '> ");
									echo (" 	<button class='col-sm-10 btn btn-lg btn-danger'><a href='myBarters.php?proposal_for={$row['job_ID']}&proposal_by={$proposer2[0]}&proposal_status=-1'>Deny</a></button> ");
									echo ("</div>");
									
									echo (" </div> ");
									
							}		
						}	
					echo (" </div> "); 
					echo (" </div> ");
					echo (" </div> ");
					echo (" </div> ");	
					}
			} 
			else {echo("<br><br><br><center><h4>No Pending Barters to show</h4></center><br><br><br>");}
			
	}	
	
	public function send_proposals($job_id=0, $user_id=0, $proposal="") {
		global $database;
		if ($job_id == 0 OR $user_id==0 OR $proposal==""){
			return false;
		}
		elseif($job_id != 0 AND $user_id!=0 AND $proposal!=""){
		
			$sql1 = "SELECT * from proposal ";
			$sql1 .= " WHERE (user_ID =  {$user_id} AND job_ID =  {$job_id}) ";
			$result_array = $database->query_array($sql1);
			if (!empty($result_array)) {
				echo '<script>alert("Sorry you have already Proposed for this job")</script>';
				return false;
			}else{
			$sql = "INSERT INTO proposal ( ";
			$sql .= "`job_ID`, `user_ID`, `proposal`, `status`, `date` ";
			$sql .= ") VALUES ( ";
			$sql .= $database->escape_value($job_id) .", ";
			$sql .= $database->escape_value($user_id) .", '";
			$sql .= $database->escape_value($proposal) ."', 0 , CURRENT_TIMESTAMP ) ";
			
			if($database->query($sql)) {
				return true;
				} else {
				return false;
				}
			}
		}
	}
	
	public function send_feedbacks($job_id=0, $feedbacker_id=0, $user_id=0, $feedback="") {
		global $database;
		if ($job_id == 0 OR $user_id==0 OR $feedback==""){
			return false;
		}
		elseif($job_id != 0 AND $user_id!=0 AND $feedback!=""){
		
			$sql1 = "SELECT * from feedback ";
			$sql1 .= " WHERE ((feedbacker_ID =  {$feedbacker_id} OR user_ID={$feedbacker_id}) AND job_ID =  {$job_id}) ";
			$result_array = $database->query_array($sql1);
			if (!empty($result_array)) {
				echo '<script>alert("Sorry your feedback has already been recorded")</script>';
				return false;
			}else{
			$sql = "INSERT INTO feedback ( ";
			$sql .= " `feedbacker_ID`, `user_ID`, `job_ID`, `feedback`, `rating`, `date` ";
			$sql .= ") VALUES ( ";
			$sql .= $database->escape_value($feedbacker_id) .", ";
			$sql .= $database->escape_value($user_id) .", ";
			$sql .= $database->escape_value($job_id) .", '";
			$sql .= $database->escape_value($feedback) ."', 0 , CURRENT_TIMESTAMP ) ";
			
			if($database->query($sql)) {
				return true;
				} else {
				return false;
				}
			}
		}
	}
	
	//update
	public function show_proposals_for_job($job_id=0) {
		
			global $database;
			$sql = "SELECT * from proposal ";
			$sql .= " WHERE job_ID =  {$job_id}";
			$result_array = $database->query($sql);
			//return $result_array['location'];
			if (!empty($result_array)) {
				while ($row = $database->fetch_array($result_array)) 
					{
					$job2 = $database->query("SELECT * FROM job WHERE job_ID = {$row['job_ID']} LIMIT 1");
					$job = $database->fetch_array($job2);
					
					
						echo (" <div class='container'> ");
						echo (" <div class='container'> ");
						echo (" <div class='col-md-10 col-md-offset-1'> ");
								
					echo("	<div class='col-sm-10'> ");
					echo("		<h4> ");
					echo("			<a hre='#' class='username'>{$job['job_title']}</a> ");
					echo("			</h4> ");
					echo("			<h5>  ");
					echo("			<i class='fa fa-calendar'></i> ");
					echo("			{$job['job_start']}  ");
					echo("			</h5> ");
					//echo("		<div class='col-sm-2' data-no-turbolink=''> ");
					echo("			<a class='btn btn-info btn-download btn-flat pull-right makeLoading' href='single_job_page.php?job_ID={$job['job_ID']}'> ");
					echo("			<i class='fa fa-share'></i> View Job ");
					echo("			</a>   ");          
					//echo("		</div> ");
					
						echo (" <h3>Your Proposal</h3> ");
						echo (" <pre> ");
						echo (" {$row['proposal']} ");
						echo (" </pre> ");
						echo (" 	</div> ");
						echo (" <div class='col-sm-3 col-sm-offset-3'> ");
						echo ("   <button class='btn btn-block btn-lg btn-success'>Approve</button> ");
						echo (" </div> "); 
						echo (" <div class='col-sm-3 '> ");
						echo ("   <div class='btn-group btn-block'> ");
						echo (" 	<button class='col-sm-10 btn btn-lg btn-danger'>Deny</button> ");						 
						echo (" 	<button class='col-sm-2 btn btn-lg btn-danger dropdown-toggle' ");
						echo (" 			data-toggle='dropdown'> ");
						echo (" 	  <span class='caret'></span> ");
						echo (" 	</button> ");						 
						echo (" 	<ul class='dropdown-menu btn-block'> ");
						echo (" 	  <li><a href='#'>Reason 1</a></li> ");
						echo (" 	  <li><a href='#'>Reason 2</a></li> ");
						echo (" 	  <li><a href='#'>Reason 3</a></li> ");
						echo (" 	</ul> ");
						echo (" </div></div></div> ");
						
					echo("		</div> ");
					}		
						
							
					
							
			}
			else {return false;}
			
	}
	
	
	public function show_approved_proposals() {
		
			global $database;
			$sql = "SELECT * from proposal ";
			$sql .= " WHERE (user_ID =  {$this->id} AND status=1)";
			$result_array = $database->query($sql);
			//return $result_array['location'];
			if (!empty($result_array) AND mysql_num_rows($result_array)!=0) {
				while ($row = $database->fetch_array($result_array)) 
					{
					$job2 = $database->query("SELECT * FROM job WHERE job_ID = {$row['job_ID']} LIMIT 1");
					$job  = $database->fetch_array($job2);
					
					
						echo (" <div class='container'> ");
						echo (" <div class='container'> ");
						echo (" <div class='col-md-10 col-md-offset-1'> ");
								
					echo("	<div class='col-sm-10'> ");
					echo("		<h4> ");
					echo("			<a hre='#' class='username'>{$job['job_title']}</a> ");
					echo("			</h4> ");
					echo("			<h5>  ");
					echo("			<i class='fa fa-calendar'></i> ");
					echo("			{$job['job_start']}  ");
					echo("			</h5> ");
					//echo("		<div class='col-sm-2' data-no-turbolink=''> ");
					echo("			<a class='btn btn-info btn-download btn-flat pull-right makeLoading' href='single_job_page.php?job_ID={$job['job_ID']}'> ");
					echo("			<i class='fa fa-share'></i> View Job ");
					echo("			</a>   ");          
					//echo("		</div> ");
					
						echo (" <h3>Your Proposal</h3> ");
						echo (" <pre> ");
						echo (" {$row['proposal']} ");
						echo (" </pre> ");
						echo (" 	</div> ");
						echo (" <div class='col-md-5 col-sm-offset-3'> ");
						echo ("   <a href='single_job_page.php?proposer_completion={$job['job_ID']}'><button class='btn btn-block btn-lg btn-success'>Mark As Complete</a></button> ");
						echo (" </div> ");
						//echo (" <div class='col-sm-3 col-sm-offset-3'> ");
						//echo ("   <button class='btn btn-block btn-lg btn-success'>Approve</button> ");
						//echo (" </div> "); 
						//echo (" <div class='col-sm-3 '> ");
						//echo ("   <div class='btn-group btn-block'> ");
						//echo (" 	<button class='col-sm-10 btn btn-lg btn-danger'>Deny</button> ");						 
						//echo (" 	<button class='col-sm-2 btn btn-lg btn-danger dropdown-toggle' ");
						//echo (" 			data-toggle='dropdown'> ");
						//echo (" 	  <span class='caret'></span> ");
						//echo (" 	</button> ");						 
						//echo (" 	<ul class='dropdown-menu btn-block'> ");
						//echo (" 	  <li><a href='#'>Reason 1</a></li> ");
						//echo (" 	  <li><a href='#'>Reason 2</a></li> ");
						//echo (" 	  <li><a href='#'>Reason 3</a></li> ");
						//echo (" 	</ul> ");
						//echo (" </div></div> ");
						
					echo("		</div> ");echo("		</div> ");
					}		
						
							
					
							
			}
			else {echo("<center><h4>No Approved Proposals to show</h4></center><br><br><br>");}
			
	}
	
	public function show_sent_proposals() {
		
			global $database;
			$sql = "SELECT * from proposal ";
			$sql .= " WHERE (user_ID =  {$this->id} AND status=0)";
			$result_array = $database->query($sql);
			//return $result_array['location'];
			if (!empty($result_array) AND mysql_num_rows($result_array)!=0) {
				while ($row = $database->fetch_array($result_array)) 
					{
					$job2 = $database->query("SELECT * FROM job WHERE job_ID = {$row['job_ID']} LIMIT 1");
					$job  = $database->fetch_array($job2);
					
					
						echo (" <div class='container'> ");
						echo (" <div class='container'> ");
						echo (" <div class='col-md-10 col-md-offset-1'> ");
								
					echo("	<div class='col-sm-10'> ");
					echo("		<h4> ");
					echo("			<a hre='#' class='username'>{$job['job_title']}</a> ");
					echo("			</h4> ");
					echo("			<h5>  ");
					echo("			<i class='fa fa-calendar'></i> ");
					echo("			{$job['job_start']}  ");
					echo("			</h5> ");
					//echo("		<div class='col-sm-2' data-no-turbolink=''> ");
					echo("			<a class='btn btn-info btn-download btn-flat pull-right makeLoading' href='single_job_page.php?job_ID={$job['job_ID']}'> ");
					echo("			<i class='fa fa-share'></i> View Job ");
					echo("			</a>   ");          
					//echo("		</div> ");
					
						echo (" <h3>Your Proposal</h3> ");
						echo (" <pre> ");
						echo (" {$row['proposal']} ");
						echo (" </pre> ");
						echo (" 	</div> ");
						//echo (" <div class='col-sm-3 col-sm-offset-3'> ");
						//echo ("   <button class='btn btn-block btn-lg btn-success'>Approve</button> ");
						//echo (" </div> "); 
						//echo (" <div class='col-sm-3 '> ");
						//echo ("   <div class='btn-group btn-block'> ");
						//echo (" 	<button class='col-sm-10 btn btn-lg btn-danger'>Deny</button> ");						 
						//echo (" 	<button class='col-sm-2 btn btn-lg btn-danger dropdown-toggle' ");
						//echo (" 			data-toggle='dropdown'> ");
						//echo (" 	  <span class='caret'></span> ");
						//echo (" 	</button> ");						 
						//echo (" 	<ul class='dropdown-menu btn-block'> ");
						//echo (" 	  <li><a href='#'>Reason 1</a></li> ");
						//echo (" 	  <li><a href='#'>Reason 2</a></li> ");
						//echo (" 	  <li><a href='#'>Reason 3</a></li> ");
						//echo (" 	</ul> ");
						//echo (" </div></div> ");
						
					echo("		</div> ");
					echo("		</div> ");
					}		
						
							
					
							
			}
			else {echo("<center><h4>No Pending Proposals to show</h4></center><br><br><br>");}
			
	}
	
	
	
	
	public function get_messagers(){
			global $database;
			$sql  = "SELECT DISTINCT id ";
			$sql .= " FROM ( ";
			$sql .= " 	SELECT sender_ID AS id ";
			$sql .= " 	FROM message WHERE recipient_ID = {$this->id} ";
			$sql .= " 	UNION ";
			$sql .= " 	SELECT recipient_ID AS id ";
			$sql .= " 	FROM message WHERE sender_ID = {$this->id} ";
			$sql .= " ) ids ";
			//$sql  = "SELECT * from message ";
			//$sql .= " WHERE sender_ID =  {$this->id} OR recipient_ID = {$this->id} ORDER BY date";
			$result_array = $database->query($sql);
			if (!empty($result_array)) {
				while ($row = $database->fetch_array($result_array)) 
					{
					/*if ($row['sender_ID'] == $this->id){
						$messager = $database->query("SELECT first_name FROM user WHERE user_ID = {$row['recipient_ID']} LIMIT 1");
						$messager2 = $database->fetch_array($messager);
						}
					if ($row['recipient_ID'] == $this->id){
						$messager = $database->query("SELECT first_name FROM user WHERE user_ID = {$row['sender_ID']} LIMIT 1");
						$messager2 = $database->fetch_array($messager);
						}
					*/	
					/*echo ("<li>");
					echo ("Feedback : {$row['message']}");
					echo ("<br/>By : {$messager2[0]}");
					echo ("<br/>On : {$row['date']}");
					echo("</li>");
					*/
					
					$messager = $database->query("SELECT first_name FROM user WHERE user_ID = {$row['id']} LIMIT 1");
					$messager2 = $database->fetch_array($messager);
					echo ("<div class='media conversation'>
						<a class='pull-left' href='#'>
						<img class='media-object' data-src='holder.js/64x64' alt='64x64' style='width: 50px; height: 50px;' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACqUlEQVR4Xu2Y60tiURTFl48STFJMwkQjUTDtixq+Av93P6iBJFTgg1JL8QWBGT4QfDX7gDIyNE3nEBO6D0Rh9+5z9rprr19dTa/XW2KHl4YFYAfwCHAG7HAGgkOQKcAUYAowBZgCO6wAY5AxyBhkDDIGdxgC/M8QY5AxyBhkDDIGGYM7rIAyBgeDAYrFIkajEYxGIwKBAA4PDzckpd+322243W54PJ5P5f6Omh9tqiTAfD5HNpuFVqvFyckJms0m9vf3EY/H1/u9vb0hn89jsVj8kwDfUfNviisJ8PLygru7O4TDYVgsFtDh9Xo9NBrNes9cLgeTybThgKenJ1SrVXGf1WoVDup2u4jFYhiPx1I1P7XVBxcoCVCr1UBfTqcTrVYLe3t7OD8/x/HxsdiOPqNGo9Eo0un02gHkBhJmuVzC7/fj5uYGXq8XZ2dnop5Mzf8iwMPDAxqNBmw2GxwOBx4fHzGdTpFMJkVzNB7UGAmSSqU2RoDmnETQ6XQiOyKRiHCOSk0ZEZQcUKlU8Pz8LA5vNptRr9eFCJQBFHq//szG5eWlGA1ywOnpqQhBapoWPfl+vw+fzweXyyU+U635VRGUBOh0OigUCggGg8IFK/teXV3h/v4ew+Hwj/OQU4gUq/w4ODgQrkkkEmKEVGp+tXm6XkkAOngmk4HBYBAjQA6gEKRmyOL05GnR99vbW9jtdjEGdP319bUIR8oA+pnG5OLiQoghU5OElFlKAtCGr6+vKJfLmEwm64aosd/XbDbbyIBSqSSeNKU+HXzlnFAohKOjI6maMs0rO0B20590n7IDflIzMmdhAfiNEL8R4jdC/EZIJj235R6mAFOAKcAUYApsS6LL9MEUYAowBZgCTAGZ9NyWe5gCTAGmAFOAKbAtiS7TB1Ng1ynwDkxRe58vH3FfAAAAAElFTkSuQmCC'>
						</a>
						<div class='media-body'>
							<input type='submit' name='message' id='messager_ID' tabindex='4' class='form-control btn btn-login' value={$messager2[0]}>
							<h5 class='media-heading'>{$messager2[0]}</h5>
							
						</div>
						</div>
							");
					}
				//<small>{$row["message"]}</small><br/>
				//<small>{$row["date"]}</small>
				//print_r ($result_array);
			} 
			else {return false;}
			
	}
	
	public function get_messages($user = 0){
		if ($user != 0){
		
		
		}
	}
}

?>