  <?php 
  //whenever you enter login first logout of the older user
  //if (isset($_SESSION)){session_destroy();}

  
  // Connection Built
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "barter";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  if (mysqli_connect_errno())
    {
    die("Database Connection Failed " . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
    }
  ?>