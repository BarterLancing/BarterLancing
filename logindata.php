<?php require('connection.php'); ?>
   
<?php 
	$username="";
	$email="";
	$password="";
	$confirm_password="";

	if(isset($_POST['register-submit']))
	{
		if(isset($_POST['username']))$username=$_POST['username'];
		if(isset($_POST['email']))$email=$_POST['email'];
		if(isset($_POST['password']))$password=$_POST['password'];
		if(isset($_POST['confirm_password']))$confirm_password=$_POST['confirm_password'];
		
		if($username!="" &&  $password!=""   && $email!="" && $confirm_password!="" )
		{
			$query = "INSERT INTO logindata(username,email,password,confirm_password) VALUES('{$username}','{$email}','{$password}','{$confirm_password}')";
			$user_result=mysqli_query($connection,$query);
			if(!$user_result)
			{
				die("Database query failed");
			}
		}
		else
		{
			echo "nai aaya .......";
		}
	}
	// else
	// 	{
	// 		echo "nai aaya 22.......";
	// 	}
?>
<?php
	if(isset($_POST['login-submit']))
	{
		  session_start();
		  $query = 'SELECT * FROM logindata WHERE username="'.$_POST['logusername'].'"';
			 // $query = 'SELECT * FROM logindata';
			$user_result=mysqli_query($connection,$query);
			if(!$user_result)
			{
				die("Database query failed2");
			}
			else
			{
				if(mysqli_num_rows($user_result)==1)
	                        {

	                        	echo "hi row";
	                        	$_SESSION['username']=$username;
	                        	header('Location: mainPage.php');
	                        }
	               else
	               {
	               		echo "Account Invalid";
	               }
				// while ($row=mysqli_fetch_array($user_result,MYSQLI_ASSOC))
				//    {
				//    		foreach ($row as $_column) 
				//    		{
				//    			echo "{$_column}";
				//    			echo "<br>";
				//    		}
				//    }   
				  	
			}
				  				  
			
	}

?>
<!-- <?php
	$loginUsername="";
	$loginPassword="";
	if (isset($_POST['login-submit'])) 
	{
		if (isset($_POST['logusername']))$loginUsername=$_POST['logusername'];
		if (isset($_POST['logpassword']))$loginPassword=$_POST['logpassword'];
		if ($loginUsername!="" && $loginPassword!="") 
		{
			$query= "SELECT * FROM logindata WHERE $loginUsername=$username AND $loginPassword=$password";
			$user_result=mysqli_query($connection,$query);
			if (!$user_result) 
			{
				die("Database connection failed3");
			}
			else
			{
				while ($row = mysqli_fetch_array($user_result, MYSQLI_ASSOC)) 
		{
		 	foreach ($row as $_column) 
		 	{
		 		echo "<li>{$_column}</li>";
		 	}
		}
			}
		}
		echo "nai aaya222";
		
	}

?> -->

<?php
mysqli_close($connection);
?>
